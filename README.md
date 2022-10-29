# SNS Web

## Development

Clone the repository, copy `.env.example` to `.env` and edit to suit.

```
composer install
php artisan key:generate
npm install
npm run dev
php artisan migrate:fresh --seed
```

Optionally seed the database with test users. One user for each role is
created with an email address of `{role}@example.com` (for example
`admin@example.com`) and password of `password`.
```
php artisan db:seed --class=UserSeeder
```
For testing or demonstration purposes, you can also seed the database with
some sample data, including a series with a director and 10 drivers with
one race results recorded.
```
php artisan db:seed --class=TestSeeder
```

## TODO

* Times translated to user-defined timezones
* User profile editor
