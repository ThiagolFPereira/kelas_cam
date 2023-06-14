# Webcam-laravel-vue-js
Webcam laravel + vue js with api and template volar + vuetify component
# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone git@github.com:ThiagolFPereira/kelas_cam.git

Switch to the repo folder

    cd Crud-laravel-vue-js

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

**TL;DR command list**

    git clone git@github.com:ThiagolFPereira/kelas_cam.git
    cd Crud-laravel-vue-js
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve
    npm install
    npm run dev

## credit
- [volar template](https://getstisla.com/)
- [framework laravel](https://laravel.com/)
- [vue.js](https://vuejs.org/v2/guide/)
- [vuetify](https://vuetifyjs.com/en/)
- [bootstrap](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
- [SweetAlert](https://sweetalert2.github.io/)
- [vue notify](https://github.com/BinarCode/vue-notifyjs?ref=madewithvuejs.com)





