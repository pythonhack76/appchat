# Usa l'immagine base PHP
FROM php:8.3 as php

# Aggiorna il gestore pacchetti e installa le dipendenze necessarie
RUN apt-get update -y && \
    apt-get install -y unzip libpq-dev libcurl4-gnutls-dev && \
    docker-php-ext-install pdo pdo_mysql bcmath && \
    pecl update-channels && pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Imposta la directory di lavoro
WORKDIR /var/www

# Copia il contenuto della directory corrente nella directory di lavoro del container
COPY . .

# Copia Composer dall'immagine ufficiale Composer
COPY --from=composer:2.7.6 /usr/bin/composer /usr/bin/composer

# Imposta la variabile d'ambiente
ENV PORT=8000

# Imposta l'entrypoint
ENTRYPOINT [ "Docker/entrypoint.sh" ]

# Esegui il server PHP al lancio del container
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
