#!/bin/bash

# Abilita l'interruzione dello script in caso di errore
set -e

# Verifica se il file vendor/autoload.php esiste, altrimenti esegue composer install
if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

# Verifica se il file .env esiste, altrimenti lo crea da .env.example
if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "env file exists"
fi

# Esegue le migrazioni, genera la chiave dell'app e pulisce la cache di Laravel
php artisan migrate --force
php artisan key:generate --ansi
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Avvia il server Laravel
php artisan serve --host=0.0.0.0 --port=$PORT --env=.env
