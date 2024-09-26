# Используем базовый образ Nginx
FROM nginx:latest

# Копируем конфигурацию Nginx в контейнер
COPY ./config/nginx/nginx.conf /etc/nginx/nginx.conf

# Копируем конфигурацию Nginx для web-приложения в контейнер
COPY ./config/nginx/sites-enabled /etc/nginx/sites-enabled

# Копируем файлы проекта в директорию Nginx
COPY ./public /var/www/html/public

# Устанавливаем права доступа
RUN chmod -R 755 /var/www/html/public

# Экспонируем порт 80 для Nginx
EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]

