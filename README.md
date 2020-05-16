# tenpages


##Админка использует
https://voyager-docs.devdojo.com/

##Доступы администратора:

    login: admin@involta.ru
    pass: admin@involta.ru
    
public - корневой каталог для nginx<br/>
.env.example - шаблон конфига<br/>

###Ставим библиотеку для работы с файлами 
sudo apt-get install php7.2-gd<br/>
sudo apt-get install php-zip<br/>

##Установка

    composer install
    php artisan voyager:install
    php artisan key:generate
    
###Ставим права

    sudo chown -R www-data:www-data storage/logs storage/framework/views storage/app/public storage/framework/sessions storage/framework/cache storage/framework/views
 
###Мигрируем и наполняем БД

    php artisan migrate
    php artisan db:seed
    
##Для image

в .env указать APP_URL для выгрузки картинок<br/>
картинки по пути storage/папка/картинка
