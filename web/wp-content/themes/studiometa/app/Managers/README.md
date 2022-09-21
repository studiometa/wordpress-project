# Managers

@todo small section about what is a manager

## ThemeManager
The main manager, that will init all the other Managers
Bootstraps Theme related functions:
- Add data to global twig context
- Add twig extensions
- Add menus
- Add theme support
- ...

## AssetsManager
Bootstraps Studiometa\WP\Assets to handle enqueing styles and scripts

## TwigManager
Add Extentions and Functions to Twig

## WordPressManager
Add functionnality to WordPress

## CustomPostTypesManager
Register custom post types

## TaxonomiesManager
Register custom taxonomies

## ACFManager
Bootsrap ACF related features
- Register ACF field groups
- Register ACF Options pages
- ...

## Add a new manager
- Add it to the managers array in `functions.php`
@todo small section about when to create a new manager
