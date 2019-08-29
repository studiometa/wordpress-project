#!/bin/bash

# Config
PROJECT_ROOT=$( cd "$(dirname "${BASH_SOURCE[0]}")/.." ; pwd -P )
source $PROJECT_ROOT/bin/utils/colors.sh

# Find last DB export
LAST_DB=$(find "$PROJECT_ROOT/data" -type f -name "*.gz" -print0 | xargs -0 stat -f "%m %N" | sort -rn | head -1 | cut -f2- -d" ")

# Output result
echo ""
echo -e "  ${BLACK}#####################################################${COLOR_OFF}"
echo -e "  ${BLACK}####### ${WHITE}STUDIO META WORDPRESS DATABASE IMPORT${BLACK} #######${COLOR_OFF}"
echo -e "  ${BLACK}#####################################################${COLOR_OFF}"
echo ""
echo -e "  💾 ${WHITE}Importing database...${COLOR_OFF}"

if [[ -z $LAST_DB ]]
then
  echo -e "  🚫 ${WHITE}No database found in the ${BLUE}data/${WHITE} folder. Exiting...${COLOR_OFF}"
  exit 0;
fi

cd $PROJECT_ROOT
read -p "$(echo -e "  ❓ ${WHITE}Are you sure to import ${BLUE}${LAST_DB/$PROJECT_ROOT/.}${WHITE} in the WordPress database?${COLOR_OFF}\n     Note: it will erase your current database.\n     (${WHITE}y${COLOR_OFF}|${WHITE}N${COLOR_OFF}) ")" -n 1 -r
echo ""

if [[ $REPLY =~ ^[Yy]$ ]]
then
	{
    $(gzip -c -d $LAST_DB | ./vendor/bin/wp db import -) \
    && echo -e "  👍 ${WHITE}Database has been successfully imported!${COLOR_OFF}"
  } || {
    echo -e "  🚫 ${WHITE}An error occured... Check the logs above to find out why.${COLOR_OFF}"
  }
else
	echo -e "  🚫 ${WHITE}Import cancelled.${COLOR_OFF}"
fi
