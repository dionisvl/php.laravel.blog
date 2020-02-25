<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## PHP simple blog boilerplate

### install

- git clone THIS_REPO
- cp .env.example .env
- php artisan key:generate
- composer install
- create empty DB and config it into .env
- php artisan migrate
- optional:
    - fill with some test posts:
        ```
      php artisan tinker  
      factory(App\Topic::class, 30)->create();  
      factory(App\Post::class, 200)->create();
        ```
- for see post categories open //site/news


### How to craft it from zero:
- composer global require laravel/installer  
- laravel new blog
- composer install

Чтобы создать фабрики, миграции, модели и ресурсный контроллер выполните:   
```
php artisan make:model Topic -a  
php artisan make:model Post -a
```
Чтобы перезаписать все таблицы с нуля выполните:  
```
php artisan migrate:fresh
```

Внимание! дата создания статей - текущая. 
И чтобы протестировать блоки популярных новостей нужно нескольким статьям поставить дату на 7 дней ранее.
