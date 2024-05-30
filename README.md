## Push Laravel base template to another repository
```php
git push git@github.com:Duplex-Marketing/newrepo +main:main
```
----
## Requirements:

* WSL2/Linux
* Docker 


## Quickstart:
1. Install composer and php packages by running:
```php
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
 
2. Make a copy of `.env.example`, to `.env`.
3. Start docker `./vendor/bin/sail up -d`, visit `http://localhost`
4. Install Telescope `./vendor/bin/sail artisan telescope:install`
5. Create tables `./vendor/bin/sail artisan migrate`
6. Generate app key `./vendor/bin/sail artisan key:generate`
7. Install npm packages `./vendor/bin/sail pnpm install`

## Packages
1. Install packages tailwindcss-convert-px-to-rem `./vendor/bin/sail pnpm install tailwindcss-convert-px-to-rem`
2. Install packages Cookie Consent `./vendor/bin/sail pnpm add vanilla-cookieconsent@next`

## Watch js changes
`./vendor/bin/sail pnpm dev`

