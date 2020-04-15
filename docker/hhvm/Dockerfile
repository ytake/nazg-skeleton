FROM hhvm/hhvm-proxygen:latest AS dev

RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive
RUN apt install -y dnsutils iputils-ping net-tools

RUN hhvm --version && php --version
RUN cd $(mktemp -d) \ 
 && curl https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm -rf /var/www

### 
FROM hhvm/hhvm-proxygen:latest AS prod

RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive
RUN apt install -y dnsutils iputils-ping net-tools

RUN hhvm --version && php --version
RUN cd $(mktemp -d) \ 
 && curl https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm -rf /var/www

ADD php-prod.ini /etc/hhvm/php.ini
ADD hhvm.hhbc /var/www/hhvm.hhbc
ADD file.cache /var/www/file.cache
