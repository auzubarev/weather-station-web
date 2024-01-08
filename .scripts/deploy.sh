#!/bin/bash

set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
(php8.3 artisan down) || true

# Pull the latest version of the app
git pull

# Install composer dependencies
php8.3 ~/.local/bin/composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Clear the old cache
php8.3 artisan clear-compiled

# Recreate cache
php8.3 artisan optimize

# Run database migrations
php8.3 artisan migrate --force

# Exit maintenance mode
php8.3 artisan up

echo "Deployment finished!"
