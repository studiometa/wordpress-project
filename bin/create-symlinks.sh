#!/bin/bash

# Colors
WHITE='\033[1;37m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

# Paths
PROJECT_ROOT=$( cd "$(dirname "${BASH_SOURCE[0]}")/.." ; pwd -P )

# MU Plugins configuration
MU_PLUGINS_SRC="$PROJECT_ROOT/src/mu-plugins"
MU_PLUGINS_DIST="$PROJECT_ROOT/web/wp-content/mu-plugins"

echo ""
echo -e "🔗 ${WHITE}Symlinking ${BLUE}${MU_PLUGINS_SRC/$PROJECT_ROOT/} ${WHITE}→ ${BLUE}${MU_PLUGINS_DIST/$PROJECT_ROOT/}${NC}..."
find $MU_PLUGINS_SRC -mindepth 1 -maxdepth 1 -not -name '.gitkeep' | xargs -I {} ln -sf {} $MU_PLUGINS_DIST
echo -e "👍 ${GREEN}Done!${NC}"

# Plugins configuration
PLUGINS_SRC="$PROJECT_ROOT/src/plugins"
PLUGINS_DIST="$PROJECT_ROOT/web/wp-content/plugins"

echo ""
echo -e "🔗 ${WHITE}Symlinking ${BLUE}${PLUGINS_SRC/$PROJECT_ROOT/} ${WHITE}→ ${BLUE}${PLUGINS_DIST/$PROJECT_ROOT/}${NC}..."
find $PLUGINS_SRC -mindepth 1 -maxdepth 1 -not -name '.gitkeep' | xargs -I {} ln -sf {} $PLUGINS_DIST
echo -e "👍 ${GREEN}Done!${NC}"

# Themes configuration
THEMES_SRC="$PROJECT_ROOT/src/themes"
THEMES_DIST="$PROJECT_ROOT/web/wp-content/themes"

echo ""
echo -e "🔗 ${WHITE}Symlinking ${BLUE}${THEMES_SRC/$PROJECT_ROOT/} ${WHITE}→ ${BLUE}${THEMES_DIST/$PROJECT_ROOT/}${NC}..."
find $THEMES_SRC -mindepth 1 -maxdepth 1 -not -name '.gitkeep' | xargs -I {} ln -sf {} $THEMES_DIST
echo -e "👍 ${GREEN}Done!${NC}"

echo ""
