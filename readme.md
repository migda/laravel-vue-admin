# Laravel 5.4 boilerplate with Vue.js admin area + REST API

Role based (user / admin) Laravel boilerplate application with admin area written in Vue.js + Vue Router + REST API.

Admin area (after successful login + auth as an admin): http://127.0.0.1:8000/admin

##Libraries and frameworks I used in this project:

- Laravel 5.4
- Vue.js 2.4.2
    - VueRouter
    - VueResource
    - VueSweetalert
    - VueMultiselect

##Instalation

    - Laravel:
    * cmd: cp .env.example to .env (copy .env.example file and rename copied file to .env)
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
    