# WordPress project

## Initialiser un nouveau projet 
```bash
composer create-project studiometa/wordpress-project www.fqdn.com
```

## Installation

Créer et configurer le fichier `.env` en vous basant sur le fichier `.env.example`.
Créer et configurer le fichier `.htaccess` en vous basant sur le fichier `.htaccess.example`.

Installer les dépendances nécessaires :

```bash
# Installer les dépendances Composer avec PHP 7.3
php7.3 $(which composer) install

# Installer les dépendances NPM avec Node 16
nvm use 16
npm install
```

Utiliser [wp-cli](https://wp-cli.org/fr/) pour finaliser l'installation. Si vous utiliser `ddev` préfixer votre commande : `ddev wp` sinon lancer la commande depuis le dossier vendor: `/vendor/bin/wp `
```bash
/vendor/bin/wp 

# Créer la base de donnée (non nécessaire si vous utilisez ddev)
/vendor/bin/wp db create 

# Installer WordPress 
/vendor/bin/wp core install --url="{URL_DU_SITE}" --title="{TITLE_DU_SITE}" --admin_user="{ADMIN_USER}" --admin_email="{ADMIN_EMAIL}"

# Installer la langue FR
/vendor/bin/wp language core install fr_FR

# Activer la langue FR
/vendor/bin/wp site switch-language

# Activer les plugins WordPress
/vendor/bin/wp plugin activate classic-editor advanced-custom-fields-pro seo-by-rank-math
```

## Développement

### Commandes disponibles

#### NPM

| Commande | Description |
|-|-|
| `npm run dev` | Démarre le serveur de compilation des fichiers SCSS et JS du thème. |
| `npm run build` | Build les fichiers SCSS, JS et Vue du thème. |
| `npm run lint` | Lint les fichiers SCSS, JS, Vue et Twig du thème avec ESLint, Stylelint et Prettier. |
| `npm run lint:scipts` | Lint les fichiers JS et Vue du thème avec ESLint et Prettier. |
| `npm run lint:styles` | Lint les fichiers SCSS et Vue du thème avec Stylelint et Prettier. |
| `npm run lint:templates` | Lint les fichiers Twig avec Prettier. |
| `npm run fix` | Formate les fichiers SCSS, JS, Vue et Twig du thème avec ESLint, Stylelint et Prettier. |
| `npm run fix:scipts` | Formate les fichiers JS et Vue du thème avec ESLint et Prettier. |
| `npm run fix:styles` | Formate les fichiers SCSS et Vue du thème avec Stylelint et Prettier. |
| `npm run fix:templates` | Formate les fichiers Twig du thème Prettier. |


#### Composer

| Commande | Description |
|-|-|
| `composer phpcs` | Lint les fichiers PHP du thème et des plugins customs |
| `composer phpstan` | Analyse de manière statiques les fichiers PHP du thème et des plugins customs |


#### WP CLI

Une liste (non exaustive) des commandes utiles de [WPCLI](https://wp-cli.org/fr/)

> Si wp cli est installé sur votre machine et configuré dans votre $PATH utiliser les commandes ci-dessous, sinon utiliser `./vendor/bin/wp` 

| Commande | Description |
|-|-|
| `wp user create <USER_LOGIN> <USER_EMAIL> --role=<ROLE_NAME> --user_pass=<PASSWORD>` | Créer un utilisateur |
| `wp transient delete --all` | Supprimer tous les transients de la base de données |
| `wp post delete $(wp post list --post_type='revision' --format=ids) --force` | Supprimer toutes les révisions |
| `wp plugin activate` | Activer un plugin |
| `wp plugin deactivate` | Désactiver un plugin |
| `wp search-replace 'http://old-domain.com/' 'http://new-domain.com/' --precise --recurse-objects --all-tables-with-prefix` | Remplacer toutes les URL's pour migrer une base de données. ⚠ Faire un backup avant de lancer cette commande, ajouter le paramètre `–dry-run` pour lancer la commande sans effectuer de changements |
| `wp language core install fr_FR && wp language core activate fr_FR` | Installer une nouvelle langue de back-office (changer `fr_FR` par la langue souhaitée) |


### Ajouter des plugins et mu-plugins

Pour ajouter des plugins et mu-plugins tiers, utilisez Composer avec l'aide de [wpackagist.org](https://wpackagist.org/). Par exemple, pour ajouter le plugin [Classic Editor](), vous pouvez procéder comme suit :

```bash
composer require wpackagist/classic-editor
```

Par défaut, tout ce qui se trouve dans les sous-dossiers de `web/wp-content` est ignoré par Git pour éviter de suivre les packages tiers installés avec Composer. Pour ajouter vos plugins et thèmes personnalisés à votre dépôt Git, vous devez ajouter des règles dans le fichier `.gitignore` :

```
!/web/wp-content/mu-plugins/my-mu-plugin.php
!/web/wp-content/plugins/my-plugin/
```

## Fonctionnalités additionnelles

### Désactivation de plugins par environnement

Le MU-plugin [Studiometa plugin disabler](./web/wp-content/mu-plugins/studiometa-plugin-disabler/README.md) permet de forcer la désactivation des plugins en fonction de l'environnement. [Voir le readme](./web/wp-content/mu-plugins/studiometa-plugin-disabler/README.md) pour plus d'informations.
