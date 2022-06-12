FROM phpstorm/php-apache:7.4-xdebug2.9

RUN \
  mkdir -p /opt/project/

COPY ./phpunit.xml /opt/project/

COPY ./phpunit.phar /opt/project/

RUN echo "Hello!"
