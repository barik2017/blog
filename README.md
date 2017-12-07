symfony2_8
==========

1. Клонируем проект:
Заходим в репозиторий, в который мы хотим, положить данный проэкт.
В console прописываем: $ git clone https://github.com/barik2017/blog.git

2.Для того чтобы установить все вспомогательные «ресурсы», которые используются в проекте, выполним команду:
 $ composer install

3. Прописываем в parametrs.yml Свои параметры, которые будут использоваться выми для этого проекта:

parametrs.yml
=============

--------------------------------------------------
parameters:
    database_host: your_database_host
    database_port: your_database_port
    database_name: your_database_name
    database_user: your_database_user
    database_password: your_database_password
    
    mailer_transport: SMTP
    mailer_host: 
    mailer_user: your_mail
    mailer_password:  your_password
---------------------------------------------------    

4. Создадим базу данных с помощью команды Doctrine 2
$ php app/console doctrine:database:create
Далее, т. к. наша db «фиктивная», для того чтобы заполнить ее данными, выполним команду:
$ php app/console doctrine:fixtures:load 

5. Для локального запуска проекта выполните:
app/console server:start и перейдите по ссылке «localhost:8000»

Или настройте Ваш сервер, и запустите проект на нем.
