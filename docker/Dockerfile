FROM composer

RUN apk add ffmpeg
RUN wget -O /tmp/symfony.apk https://github.com/symfony-cli/symfony-cli/releases/download/v5.4.1/symfony-cli_5.4.1_x86_64.apk
RUN apk add /tmp/symfony.apk --allow-untrusted