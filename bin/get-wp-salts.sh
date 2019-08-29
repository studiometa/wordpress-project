#!/bin/bash

# Config
PROJECT_ROOT=$( cd "$(dirname "${BASH_SOURCE[0]}")/.." ; pwd -P )
source $PROJECT_ROOT/bin/utils/colors.sh

# Format regexp
REPLACE_REGEXP="define\('([A-z]+)',\s+'(.+)'\);"

# Output result
echo ""
echo -e "  ${BLACK}################################################${COLOR_OFF}"
echo -e "  ${BLACK}####### ${WHITE}STUDIO META WORDPRESS SALTS KEYS${BLACK} #######${COLOR_OFF}"
echo -e "  ${BLACK}################################################${COLOR_OFF}"
echo ""

echo -e "  ⚙  ${WHITE}Getting WordPress salt keys...${COLOR_OFF}"

# Get salts
RAW_SALTS=$(curl -s 'https://api.wordpress.org/secret-key/1.1/salt/')

echo ""
echo "$RAW_SALTS" | perl -pe "s/$REPLACE_REGEXP/${WHITE}\1${COLOR_OFF}='${GREEN}\2${COLOR_OFF}'/g"
echo ""
echo -e "  👆 ${WHITE}Done!${COLOR_OFF}"
