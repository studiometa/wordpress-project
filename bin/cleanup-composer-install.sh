#!/bin/bash

# Config
PROJECT_ROOT=$( cd "$(dirname "${BASH_SOURCE[0]}")/.." ; pwd -P )
source $PROJECT_ROOT/bin/utils/colors.sh

# Paths
PLUGINS_PATH="$PROJECT_ROOT/web/wp-content/plugins"
THEMES_PATH="$PROJECT_ROOT/web/wp-content/themes"

echo ""
echo -e "  ${BLACK}#####################################################${COLOR_OFF}"
echo -e "  ${BLACK}####### ${WHITE}STUDIO META WORDPRESS COMPOSER CLEANUP${BLACK} #######${COLOR_OFF}"
echo -e "  ${BLACK}#####################################################${COLOR_OFF}"
echo ""

# Remove unused wp-content/ folder
if [ -e "$PROJECT_ROOT/web/wp/wp-content" ]; then
  echo -e "  🗑  ${WHITE}Removing ths old ${BLUE}web/wp/wp-content${WHITE} folder...${COLOR_OFF}"
	rm -r "$PROJECT_ROOT/web/wp/wp-content"/
	echo -e "  👍 ${WHITE}The old ${BLUE}web/wp/wp-content ${WHITE}has been removed!${COLOR_OFF}"
else
	echo -e "  👍 ${WHITE}The old ${BLUE}web/wp/wp-content ${WHITE}folder has already been removed!${COLOR_OFF}"
fi
echo ""
