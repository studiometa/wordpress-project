#!/bin/bash

# Colors
WHITE='\033[1;37m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

# Paths
PROJECT_ROOT=$( cd "$(dirname "${BASH_SOURCE[0]}")/.." ; pwd -P )
SOURCE_CONFIG="$PROJECT_ROOT/bin/source/wp-config-sample.php"
DEST_CONFIG="$PROJECT_ROOT/wp-config.php"

# Output result
echo "#####################################################"
echo "####### STUDIO META WORDPRESS GENERATE CONFIG #######"
echo "#####################################################"
echo ""
echo -e "⚙  ${WHITE}Copying config file sample ${BLUE}bin/source/wp-config-sample.php${WHITE} → ${BLUE}wp-config.php${WHITE}...${NC}"
cp $SOURCE_CONFIG $DEST_CONFIG
echo -e "👍 ${WHITE}Config file successfully copied to ${BLUE}wp-config.php${WHITE}!${NC}"
echo ""
