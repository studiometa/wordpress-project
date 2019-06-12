# Wordpress skeleton
## Prerequisites
- PHP >= 7.0
- Composer

## Usage
### Install Wordpress
```bash
$ git clone git@bitbucket.org:studiometa/wordpress-skeleton.git
$ cd wordpress-skeleton
$ cp .env.example .env # Create environment variables file (database, host, salt keys…)
$ bin/get-wp-salts.sh # You can use this script to get auto-generated salt keys
$ nano .env # Edit environment variables
$ bin/generate-wp-config.sh # Generate wp-config.php file

$ composer install
$ ./vendor/bin/wp --info # Test your WP CLI installation
$ ./vendor/bin/wp core download --path=web/ --locale=fr_FR # Install a fresh Wordpress
$ ./vendor/bin/wp core install --prompt=url,title,admin_user,admin_email,admin_password --skip-email --path=web/
$ ./vendor/bin/wp core is-installed --path=web/ # Test your Wordpress configuration (if return empty, your Wordpress is correctly installed!)
```

### Update Wordpress
```bash
$ ./vendor/bin/wp core update --path=web/ # Update Wordpress core
$ ./vendor/bin/wp core update-db --path=web/ # Update Wordpress database
```