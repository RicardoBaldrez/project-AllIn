FROM webdevops/php-apache:7.1
ENV TERM=xterm
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

ENV WORKDIR=/app/
WORKDIR /app/

# COPY conf/10-server.conf /opt/docker/etc/httpd/conf.d/10-server.conf

RUN apt-get update && apt-get install -y \
 git \
 zip \
 nano \
 unzip \
 build-essential \
 && rm -rf /var/lib/apt/lists/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

RUN chown -R application.application /app