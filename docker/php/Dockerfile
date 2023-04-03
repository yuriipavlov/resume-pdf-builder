FROM php:8.2-cli-alpine3.17

# Persistent dependencies
RUN set -eux; \
    apk --update add --no-cache \
                 bash \
                 curl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN mkdir -p /srv/app; \
    mkdir -p /srv/output

WORKDIR /srv/app

# Copy entrypoint script
COPY run /usr/local/bin/
RUN chmod +x /usr/local/bin/run

# Run bach watcher to run php scripts
CMD ["watch", "php", "app.php"]