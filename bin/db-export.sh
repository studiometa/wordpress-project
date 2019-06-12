#!/bin/bash

parent_path=$( cd "$(dirname "${BASH_SOURCE[0]}")" ; pwd -P )
source_path='/bin/source/wp-config-sample.php'
dest_path='/wp-config.php'

# Output result
echo "#####################################################"
echo "####### STUDIO META WORDPRESS DATABASE EXPORT #######"
echo "#####################################################"
echo ""

cd $parent_path

wp db export - --add-drop-table | gzip > ../data/`date +\"%Y%m%d-%H%M\"`.sql.gz

echo "Database has been successfully exported."
