#!/bin/bash

parent_path=$( cd "$(dirname "${BASH_SOURCE[0]}")" ; pwd -P )
source_path='./source/wp-config-sample.php'
dest_path='../wp-config.php'

# Output result
echo "#####################################################"
echo "####### STUDIO META WORDPRESS GENERATE CONFIG #######"
echo "#####################################################"
echo ""

cd parent_path
cp $source_path $dest_path
echo "File $parent_path/$dest_path generated."
