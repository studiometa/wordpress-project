#!/bin/bash

# Config
PROJECT_ROOT=$( cd "$(dirname "${BASH_SOURCE[0]}")/.." ; pwd -P )
source $PROJECT_ROOT/bin/utils/colors.sh

# Paths
SOURCE_CONFIG="$PROJECT_ROOT/bin/source/wp-config-sample.php"
DEST_CONFIG="$PROJECT_ROOT/web/wp-config.php"

# Output result
echo ""
echo -e "  ${BLACK}#####################################################${COLOR_OFF}"
echo -e "  ${BLACK}####### ${WHITE}STUDIO META WORDPRESS GENERATE CONFIG${BLACK} #######${COLOR_OFF}"
echo -e "  ${BLACK}#####################################################${COLOR_OFF}"
echo ""

echo -e "  ⚙  ${WHITE}Copying config file sample ${BLUE}${SOURCE_CONFIG/$PROJECT_ROOT\//}${WHITE} → ${BLUE}${DEST_CONFIG/$PROJECT_ROOT\//}${WHITE}...${NC}"
cp $SOURCE_CONFIG $DEST_CONFIG
echo -e "  👍 ${WHITE}Config file successfully copied to ${BLUE}${DEST_CONFIG/$PROJECT_ROOT\//}${WHITE}!${NC}"
echo ""
