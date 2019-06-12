#!/bin/bash

parent_path=$( cd "$(dirname "${BASH_SOURCE[0]}")" ; pwd -P )
source_path='/bin/source/wp-config-sample.php'
dest_path='/wp-config.php'

# Output result
echo "#####################################################"
echo "####### STUDIO META WORDPRESS DATABASE IMPORT #######"
echo "#####################################################"
echo ""

cd $parent_path

read -p "Are you sure to import database ? " -n 1 -r
echo

if [[ $REPLY =~ ^[Yy]$ ]]
then
	gzip -c -d `find ../data -type f -name \"*.gz\" -print0 | xargs -0 stat -f \"%m %N\" | sort -rn | head -1 | cut -f2- -d\" \"` | wp db import -
	echo "Database has been successfully imported."
else
	echo "Import cancelled."
fi

