FROM php:8.4-cli-trixie

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/
RUN apt-get update
RUN apt-get install --no-install-recommends -y unzip git

WORKDIR /app
