#!/bin/bash

# Colors
WHITE='\033[1;37m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

# Format regexp
REPLACE_REGEXP="define\('([A-z]+)',\s+'(.+)'\);"

# Output result
echo "################################################"
echo "####### STUDIO META WORDPRESS SALTS KEYS #######"
echo "################################################"
echo ""
echo -e "⚙  ${WHITE}Getting WordPress salt keys...${NC}"
RAW_SALTS=$(curl -s 'https://api.wordpress.org/secret-key/1.1/salt/')
echo ""
echo "$RAW_SALTS" | perl -pe "s/$REPLACE_REGEXP/${WHITE}\1${NC}='${GREEN}\2${NC}'/g"
echo ""
