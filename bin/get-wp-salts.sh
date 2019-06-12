#!/bin/bash

# Get Wordpress necessary salts from Wordpress API
raw_salts=$(curl 'https://api.wordpress.org/secret-key/1.1/salt/')
replace_regexp="define\('([A-z]+)',\s+'(.+)'\);"

# Output result
echo "################################################"
echo "####### STUDIO META WORDPRESS SALTS KEYS #######"
echo "################################################"
echo ""
echo "${raw_salts}" | perl -pe "s/$replace_regexp/\1='\2'/g"