#!/bin/bash

# Config
PROJECT_ROOT=$( cd "$(dirname "${BASH_SOURCE[0]}")/.." ; pwd -P )
source $PROJECT_ROOT/bin/utils/colors.sh

DATE=$(date +"%Y%m%d-%H%M")
FILENAME="$DATE.sql.gz"

# Output result
echo ""
echo -e "  ${BLACK}#####################################################${COLOR_OFF}"
echo -e "  ${BLACK}####### ${WHITE}STUDIO META WORDPRESS DATABASE EXPORT${BLACK} #######${COLOR_OFF}"
echo -e "  ${BLACK}#####################################################${COLOR_OFF}"
echo ""
echo -e "  💾 ${WHITE}Exporting database...${COLOR_OFF}"

cd $PROJECT_ROOT
{
  $(./vendor/bin/wp config path) \
  && $(./vendor/bin/wp db export - --add-drop-table | gzip > "$PROJECT_ROOT/data/$DATE.sql.gz") \
  && echo -e "  👍 ${WHITE}Database has been successfully exported to ${BLUE}data/$DATE.sql.gz${COLOR_OFF}"
} || {
  echo -e "  🚫 ${WHITE}An error occured... Check the logs above to find out why.${COLOR_OFF}"
}

echo ""
