#!/bin/bash

source_path='/bin/source/wp-config-sample.php'
dest_path='/wp-config.php'

# Output result
echo "#####################################################"
echo "####### STUDIO META WORDPRESS GENERATE CONFIG #######"
echo "#####################################################"
echo ""

cp $PWD$source_path $PWD$dest_path
echo "File $PWD$dest_path generated."
