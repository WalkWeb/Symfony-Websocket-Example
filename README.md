
# Пример использования вебсокетов в php

Данный проект – это пример использования вебсокетов в php, на фреймворке Symfony, на примере функционала простейшего
чата.

Пример взят из [этого руководства](https://rojas.io/symfony-5-websockets-tutorial/) – мне понравился этот пример и решил 
сохранить его у себя как отдельный мини-проект.


## Установка

Переходим в каталог /var/www:

`cd /var/www/`

Клонируем проект с github:

`git clone https://github.com/WalkWeb/Symfony-Websocket-Example.git symfony-websocket.loc`

Переходим в созданный каталог с проектом:

`cd symfony-websocket.loc/`

Устанавливаем все необходимые зависимости:

`composer install`

Далее нужно или настроить локальный домен, или запустить встроенный в php веб-сервер. Лично мне первый вариант удобней – 
не нужно каждый раз запускать встроенный веб-сервер, но писать о том как это сделать долго – поищите отдельные 
руководства в интернете.

В любом случае, после этого вам нужно будет поправить конфиг (более правильно создав копию `.env.local` из `.env`) и
указать там корректный url:

```
WEBSOCKET_URL=symfony-websocket.loc
WEBSOCKET_PORT=3001
```

После чего остается только запустить команду, которая будет принимать вебсокетные соединения:

`php bin/console run:websocket-server`


## Пример использования

Откройте два окна с url проекта и отправьте какие-нибудь сообщения. Вы увидите, что они автоматически появляются в 
другом окне:

![alt text](public/images/example.png)
