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
echo -e "💾 ${WHITE}Exporting database...${NC}"

cd $PROJECT_ROOT
./vendor/bin/wp db export - --add-drop-table | gzip > "$PROJECT_ROOT/data/$DATE.sql.gz"

echo -e "👍 ${WHITE}Database has been successfully exported to ${BLUE}data/$DATE.sql.gz${NC}"
echo ""
