#!/bin/sh

# Carregar variáveis do arquivo .env
if [ -f .env ]; then
  export $(grep -v '^#' .env | xargs)
fi

# Verificar se as variáveis foram exportadas corretamente

# Define o conteúdo do arquivo docker-compose.yml
cat <<EOF > compose.yml
services:
  nginx:
    image: nginx:alpine
    container_name: ${APP_NAME}_nginx
    restart: unless-stopped
    tty: true
    ports:
      - '7000:80'
    volumes:
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf
      - .${APP_PATH}:/var/www${APP_PATH}
    depends_on:
      php:
          condition: service_started
    networks:
      - ${APP_NAME}_network
    links:
      - php
  php:
    container_name: ${APP_NAME}_app
    build:
      context: ${APP_PATH}
      dockerfile: Dockerfile
    restart: unless-stopped
    tty: true
    expose:
      - '9000'
    volumes:
      - .${APP_PATH}:/var/www${APP_PATH}
    networks:
      - ${APP_NAME}_network
    environment:
      DB_CONNECTION: ${DATABASE_DRIVER}
      DB_HOST: ${APP_NAME}_database
      DB_PORT: ${DATABASE_PORT}
      DB_DATABASE: ${APP_NAME}_${DATABASE_NAME}
      DB_USERNAME: ${DATABASE_USERNAME}
      DB_PASSWORD: ${DATABASE_PASSWORD}
    depends_on:
      db:
        condition: healthcheck
  db:
    image: postgres:latest
    container_name: ${APP_NAME}_database
    environment:
      POSTGRES_USER: ${DATABASE_USERNAME}
      POSTGRES_PASSWORD: ${DATABASE_PASSWORD}
      POSTGRES_DB: ${APP_NAME}_database
    volumes:
      - ${APP_NAME}_database_volume:/var/lib/postgres
    networks:
      - ${APP_NAME}_network
    restart: always
    healthcheck:
      test: ["CMD-SHELL", "pg_isready -U ${DATABASE_USERNAME} ${APP_NAME}_database"]
      interval: 5s
      timeout: 5s
      retries: 5
volumes:
  ${APP_NAME}_database_volume:

networks:
  ${APP_NAME}_network:
    driver: bridge
EOF