# Band Tracker

This is a simple Laravel project that lists information on bands and their 
albums. Band and album data can be modified easily using the interface.

## Installation

Laravel 5.6 is used, so you will need to have a version of PHP which supports that, as well as any other necessary dependencies.

```
git clone https://github.com/Jantho1990/BandTracker.git bandtracker
cd bandtracker
composer install
npm install
cp .env.example .env
php artisan key:generate
```

If you have a global Homestead box:

```
cd /your/homestead/directory
vagrant up
vagrant ssh
cd /to/code/directory
php artisan migrate --seed
```

> Don't forget to add a development url/IP address to your Homestead configuration and your hosts file!

If you want to set up a project-based Homestead box:

```
php vendor/bin/homestead make
vagrant up
vagrant ssh
cd /to/code/directory
php artisan migrate --seed
```

> By default, this will create a Homestead.yaml file with the default Homestead
> settings. You should check the [Homestead](https://laravel.com/docs/master/homestead) page in Laravel's docs to see how to 
> customize it for your needs.

If you don't want to use Homestead, you can run it locally, but you will need to 
make sure you have any needed applications installed, such as MySQL.

```
php artisan migrate --seed
php artisan serve
```

> This will serve the website on localhost:8000 by default.


## Unit Testing

If you wish to run the unit tests:

`./vendor/bin/phpunit`

There are no Dusk tests yet, but there are plans to rectify that.

## Questions
- Can I use this for [whatever]?
    - Sure. This is just a demo project that has no functional value,
    but if you get something out of it, cool!
- Do you plan on adding more features?
    - Yes, but this is a demo project so it will be as I feel like it.
- I thought of a cool feature, can I suggest it to you?
    - Feel free to open an issue, or better yet a pull request implementing said
    feature. Again, I'll deal with these as I feel like it.
- What, no tracks for albums?
    - Future feature!
- What are all these seeded bands?
    - They are Christian rock/metal bands that I happen to like. That being said, I do have plans to refactor this to use Faker-generated data.
 

#### Last edited by Joshua Anthony 03/25/2018
