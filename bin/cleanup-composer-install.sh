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

# Remove akismet
echo -e "🗑  ${WHITE}Removing ${BLUE}${PLUGINS_PATH/$PROJECT_ROOT/}/akismet${WHITE}...${NC}"
if [ -e "$PLUGINS_PATH/akismet" ]; then
	rm -r "$PLUGINS_PATH/akismet"/
	echo -e "👍 ${BLUE}${PLUGINS_PATH/$PROJECT_ROOT/}/akismet ${WHITE}removed!${NC}"
else
	echo -e "👍 ${BLUE}${PLUGINS_PATH/$PROJECT_ROOT/}/akismet ${WHITE}already removed!${NC}"
fi
echo ""

# Remove hello-dolly
echo -e "🗑  ${WHITE}Removing ${BLUE}${PLUGINS_PATH/$PROJECT_ROOT/}/hello.php${WHITE}...${NC}"
if [ -e "$PLUGINS_PATH/hello.php" ]; then
	rm -r "$PLUGINS_PATH/hello.php"
	echo -e "👍 ${BLUE}${PLUGINS_PATH/$PROJECT_ROOT/}/hello.php ${WHITE}removed!${NC}"
else
	echo -e "👍 ${BLUE}${PLUGINS_PATH/$PROJECT_ROOT/}/hello.php ${WHITE}already removed!${NC}"
fi
echo ""

# Remove twentynineteen
echo -e "🗑  ${WHITE}Removing ${BLUE}${THEMES_PATH/$PROJECT_ROOT/}/twentynineteen${WHITE}...${NC}"
if [ -e "$THEMES_PATH/twentynineteen" ]; then
	rm -r "$THEMES_PATH/twentynineteen"
	echo -e "👍 ${BLUE}${THEMES_PATH/$PROJECT_ROOT/}/twentynineteen ${WHITE}removed!${NC}"
else
	echo -e "👍 ${BLUE}${THEMES_PATH/$PROJECT_ROOT/}/twentynineteen ${WHITE}already removed!${NC}"
fi
echo ""

# Remove twentysixteen
echo -e "🗑  ${WHITE}Removing ${BLUE}${THEMES_PATH/$PROJECT_ROOT/}/twentysixteen${WHITE}...${NC}"
if [ -e "$THEMES_PATH/twentysixteen" ]; then
	rm -r "$THEMES_PATH/twentysixteen"
	echo -e "👍 ${BLUE}${THEMES_PATH/$PROJECT_ROOT/}/twentysixteen ${WHITE}removed!${NC}"
else
	echo -e "👍 ${BLUE}${THEMES_PATH/$PROJECT_ROOT/}/twentysixteen ${WHITE}already removed!${NC}"
fi
echo ""

# Remove twentyseventeen
echo -e "🗑  ${WHITE}Removing ${BLUE}${THEMES_PATH/$PROJECT_ROOT/}/twentyseventeen${WHITE}...${NC}"
if [ -e "$THEMES_PATH/twentyseventeen" ]; then
	rm -r "$THEMES_PATH/twentyseventeen"
	echo -e "👍 ${BLUE}${THEMES_PATH/$PROJECT_ROOT/}/twentyseventeen ${WHITE}removed!${NC}"
else
	echo -e "👍 ${BLUE}${THEMES_PATH/$PROJECT_ROOT/}/twentyseventeen ${WHITE}already removed!${NC}"
fi
echo ""
