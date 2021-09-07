## About Cybersport project

The project developing for predicting results of computer games matches. 

## Project technologies

Backend API: php framework [Laravel](https://laravel.com).

Frontend: js framework [Vue.js](https://v3.vuejs.org).

## Packages

- **[Laravel 8](https://github.com/laravel/laravel)**
- **[Vue3](https://github.com/vuejs/vue-next)**


## Installation

Clone the project
```bash
git clone https://github.com/GalchenkoIurii/cybersport.git
```
Create .env file and update the database connection info.
```bash
cp .env.example .env
```
Install dependencies:
```bash
composer install
```
```bash
npm install
```
Run these commands
```bash
php artisan key:generate
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

## Usage

```bash
php artisan serve
```