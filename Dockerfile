FROM php:7.2.28-apache

RUN docker-php-ext-install mysqli
RUN cp /usr/share/zoneinfo/Asia/Bangkok /etc/localtime \
&& echo "Asia/Bangkok" >  /etc/timezone