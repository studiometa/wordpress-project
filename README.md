# Wordpress skeleton
## Prerequisites
- PHP
- Composer

## Usage
```bash
$ git clone git@bitbucket.org:studiometa/wordpress-skeleton.git
$ cd wordpress-skeleton
$ cp .env.example .env # Create environment variables file (database, host, salt keys…)
$ bin/get-wp-salts.sh # You can use this script to get auto-generated salt keys
$ nano .env # Edit environment variables
$ bin/generate-wp-config.sh # Generate wp-config.php file

$ composer install -o
$ ./vendor/bin/wp --info # Test your WP CLI installation
$ ./vendor/bin/wp core download --path=web/ --locale=fr_FR # Install a fresh Wordpress
$ ./vendor/bin/wp core install --url=local.wordpress-skeleton.com --title=Skeleton --admin_user=wordpress_skeleton --prompt=admin_password --admin_email=lucas.s@studiometa.fr --skip-email --path=web/
$ ./vendor/bin/wp core is-installed --path=web/ # Test your Wordpress configuration (if return empty, your Wordpress is correctly installed!)
```