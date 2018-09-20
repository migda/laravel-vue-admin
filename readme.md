# Laravel 5.7 boilerplate with Vue.js 2 admin area + REST API

Role based (user / admin) Laravel boilerplate application with admin area written in Vue.js + Vue Router + REST API.

Admin area (after successful login + auth as an admin): http://127.0.0.1:8000/admin

##Libraries and frameworks I used in this project:

- Laravel 5.7
- Vue.js 2.5.17
    - VueRouter
    - VueResource
    - VueSweetalert
    - VueMultiselect
- Loader: https://www.w3schools.com/howto/howto_css_loader.asp

##Instalation

    - Composer:
    * cmd: composer install
    - Laravel:
    * cmd: cp .env.example .env (copy .env.example file and rename copied file to .env)
    * modify .env and set up db connection
    * cmd: php artisan key:generate
    * cmd: php artisan migrate
    * browser: register user via register form
    * db query: access to admin panel: UPDATE users SET role = 2 WHERE id = 1; #user.id == 1
    
    - PHPUnit:
    * configure your .env file and db connection (TEST_)
    * php artisan migrate --database=test
    
    - Vue.js:
    *cmd: npm install
    *cmd: npm run dev
    