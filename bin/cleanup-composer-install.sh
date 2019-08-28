#!/bin/bash

# Colors
WHITE='\033[1;37m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

# Paths
PROJECT_ROOT=$( cd "$(dirname "${BASH_SOURCE[0]}")/.." ; pwd -P )
PLUGINS_PATH="$PROJECT_ROOT/web/wp-content/plugins"
THEMES_PATH="$PROJECT_ROOT/web/wp-content/themes"

echo ""

# Remove unused wp-content/ folder
echo -e "🗑  ${WHITE}Removing ${BLUE}web/app/wp-content${WHITE}...${NC}"
if [ -e "$PROJECT_ROOT/web/app/wp-content" ]; then
	rm -r "$PROJECT_ROOT/web/app/wp-content"/
	echo -e "👍 ${BLUE}web/app/wp-content ${WHITE}removed!${NC}"
else
	echo -e "👍 ${BLUE}web/app/wp-content ${WHITE}already removed!${NC}"
fi
echo ""
