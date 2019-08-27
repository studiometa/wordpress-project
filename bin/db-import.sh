#!/bin/bash

# Colors
WHITE='\033[1;37m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

# Paths
PROJECT_ROOT=$( cd "$(dirname "${BASH_SOURCE[0]}")/.." ; pwd -P )
DATE=$(date +"%Y%m%d-%H%M")
FILENAME="$DATE.sql.gz"

# Output result
echo "#####################################################"
echo "####### STUDIO META WORDPRESS DATABASE EXPORT #######"
echo "#####################################################"
echo ""
echo -e "💾 ${WHITE}Importing database...${NC}"

cd $PROJECT_ROOT
read -p "$(echo -e "${WHITE}Are you sure to import database ?${NC} (y|N) ")" -n 1 -r
echo ""

if [[ $REPLY =~ ^[Yy]$ ]]
then
	gzip -c -d `find ./data -type f -name \"*.gz\" -print0 | xargs -0 stat -f \"%m %N\" | sort -rn | head -1 | cut -f2- -d\" \"` | ./vendor/bin/wp db import -
	echo -e "👍 ${WHITE}Database has been successfully imported!"
else
	echo "🚫 Import cancelled."
fi
