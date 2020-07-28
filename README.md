# Демо проект API на slim && vuejs
 
###

######FRONTEND
http://localhost:8080

######API
http://localhost:8081

____________________________

######Собрать докер контейнер заново

docker-compose up --build -d

____________________________

######Удалить контейнеры

docker-compose down --remove-orphans
____________________________

######Пересобрать контейнеры

docker-compose up -d

____________________________

######Frontend Установить npm зависимости 

docker-compose exec frontend-nodejs npm install

____________________________

######Frontend Для запуска npm в режиме разработки

docker-compose exec frontend-nodejs npm run watch

____________________________

######Frontend Создание .env файла 

docker-compose exec frontend-nodejs rm -f .env.local

docker-compose exec frontend-nodejs ln -sr .env.local.example .env.local

____________________________


######API Для запуска composer

docker-compose exec api-php-cli composer

____________________________

######API Для запуска composer

docker-compose exec api-php-cli rm -f .env

docker-compose exec api-php-cli ln -sr .env.example .env

____________________________
