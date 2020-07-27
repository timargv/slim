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

