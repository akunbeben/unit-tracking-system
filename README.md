<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Fleet Tracking System
### Installation

- Clone this repo.
- First thing to do, run `composer install`
- Create `.env` file and config your environtment
- Run `php artisan key:generate` to generate APP_KEY
- Do database migration `php artisan migrate`
- And finally you can run `php artisan serve`

### Available Routes

| Method   | URI                                     | Route Name                        | Middleware   |
|----------|-----------------------------------------|-----------------------------------|--------------|
| GET      | /                                       | home                              | web,auth     |
| GET      | /login                                  | loginView                         | web,guest    |
| POST     | /login                                  | login                             | web,guest    |
| GET      | /units                                  | unit.list                         | web,auth     |
| GET      | /units/create                           | unit.create                       | web,auth     |
| POST     | /units/create                           | unit.store                        | web,auth     |
| GET      | /units/{id}/track                       | unit.track                        | web,auth     |
| GET      | /units/{id}/edit                        | unit.edit                         | web,auth     |
| PUT      | /units/{id}/update                      | unit.update                       | web,auth     |
| DELETE   | /units/{id}/delete                      | unit.delete                       | web,auth     |
| GET      | /owners                                 | owner.list                        | web,auth     |
| GET      | /owners/create                          | owner.create                      | web,auth     |
| POST     | /owners/create                          | owner.store                       | web,auth     |
| GET      | /owners/{id}/edit                       | owner.edit                        | web,auth     |
| PUT      | /owners/{id}/update                     | owner.update                      | web,auth     |
| DELETE   | /owners/{id}/delete                     | owner.delete                      | web,auth     |
