## Gettin' Groovy with Nuxt & Laravel 11 (PHP 8.3)

Welcome to our guide to sync up your Nuxt.js frontend and Laravel 11 backend, getting them ready to rock and roll!

### Here We Deploy it for Preview

Frontend : [Overstore](https://tester.fioep.com/)
Backend : [LaravelBe](https://efarm.shiny.my.id/)

Before we dive in, make sure you have the following prerequisites set up:

- **Node.js & npm (or yarn)** - Get it from [here](https://nodejs.org/en).
- **Composer** - You can download it [here](https://getcomposer.org/download/).
- **PHP 8.3** - Ensure you have it installed. Check the supported versions [here](https://www.php.net/supported-versions.php).

### Let's Get This Started:

1. **Clone Your Project:**

   Use Git to grab your project from wherever it's chillin'.

2. **Install:**

   In your project's root directory, run `npm install` (or `yarn install`) for Nuxt.js.
   Head over to the `laravel-be` folder (your Laravel backend) and run `composer install` to get its dependencies.

### Config Time (Don't Worry, It's Easy):

1. In the `laravel-be` folder, copy `.env.example` to `.env` we using sqlite to make it simple
2. use `php artisan migrate --seed` to setup database and make seeder

### Time to Shine!

1. In the `laravel-be` folder, fire up the party with `php artisan serve`. This starts your Laravel API (usually on http://localhost:8000).
2. Back in your Nuxt.js root, run `npm run dev` (or `yarn dev`) to launch the Nuxt.js frontend (usually on http://localhost:3000).

### That's It!

Now, your Nuxt.js frontend and Laravel backend are jamming together. Enjoy the groove! 🎶
