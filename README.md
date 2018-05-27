Приложение формирующего домашнюю бухгалтерию ( онлайн расходов для учета расходов и доходов семьи и личных финансов )


### Быстрая настройка проекта
###### (Не включая среду dev)
1. Запустить `git clone https://github.com/nizom333/accountant.loc.git finance.loc`
2. Создайте базу данных MySQL для проекта
    * ```mysql -u root -p```
    * ```create database finance_db;```
    * ```\q```
3. Из проектов root run `cp .env.example .env`
4. НАСТРОЙТЕ ВАШ `.env` ФАЙЛ
5. Запустите  `composer install` из корневой папки проектов
* ```php artisan key:generate```
* ```php artisan migrate```
* ```composer dump-autoload```
* ```php artisan db:seed```

#### Просмотр проекта в браузере
1. В корневой папке проектов запускается `php artisan serve`
2. Откройте веб-браузер и перейдите к `http://localhost`
