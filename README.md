# Fursa

"Fursa" platform is the best place to find job opportunities and recruit talent. It brings together companies and institutions looking for the finest local and international professionals in various fields. The platform allows you to post job openings and connect with ideal candidates who have the required skills and experience.



# Development Environment

Clone the repo to your local computer:

```shell
git clone https://github.com/H-7117/fursaJob
```

Navigate to the cloned project folder:

```shell
cd fursaJob
```

Install the dependencies:

```shell
composer install
```

copy `.env.example` file and rename the copy to `.env`. This file is not in the repo because it is sensitive:

```shell
cp .env.expample .env
```

Configure the database information in the `.env` file (`DB_*`).

```js
DB_DATABASE = yourdatabase_name;
DB_USERNAME = your_username;
DB_PASSWORD = your_password;
```

Sets the `APP_KEY` value in your `.env` file:

```shell
php artisan key:generate
```

Create the `database/migrations` schema:

```shell
php artisan migrate
//OR to drop all existing tables
php artisan migrate:fresh
```

Seed the database with fake data.

Note: there will be three default users:

- admin with username & password: `admin`,`123456` . company , seeker you can resigter and create your own account 

```bash
php artisan db:seed
```



```bash
php artisan serve
```

# Powered by

- **Laravel** as a backend.
- **ckEditor** text editor.
- **Bootstrap** for styling html.
- **Fontawesome** to use icons.

### deployed at <a href="http://saif.hadramout-bootcamps.com/" target="_blank">cerity pro</a>
