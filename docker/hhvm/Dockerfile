FROM hhvm/hhvm-proxygen:4.4-latest

RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive
RUN apt install -y dnsutils iputils-ping net-tools

RUN hhvm --version && php --version
RUN cd $(mktemp -d) \ 
 && curl https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm -rf /var/www

EXPOSE 80
