House Mate - Multi Tenant House Management Software
=====================

![House Mate Screenshot](/public/assets/img/House-Mate-Shortened.png)

Live Website Here: https://house-mate-1.herokuapp.com
                         
-------------------------
Utility and expense tracking software for households with multiple tenants built using Larave framework.

Installation Steps
-----------------

### 1. Clone The Repository.

Clone the repository to your local machine and set up your local development environment.

### 2. Add The Database Credentials.

You'll need to set up a database on your local machine using MySQL, and then add the credentials for 
that database into the .env file. 

It should look something like this:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YourDatabaseName
DB_USERNAME=YourUsername
DB_PASSWORD=YourPassword
```

### 3. Run Migrations and Seed

After you have the database set up and connected, the next step is to run the migrations 
and seed the database.

To do that, just run these commands:

```
php artisan migrate
php artisan db:seed
```

### 4. Start The Server

For the final step, run one last command to get Laravel's built in server up and running.

```
php artisan serve
```

Seeded Data and Users
---------------------

The seeded data should start you off with a couple of utilities, some bills, and an Admin and Tenant account.

The admin login credentials will be:

> Email: Admin@Admin.com 

> Password: password



The tenant login credentials will be:

Email: Tenant@Tenant.com
Password: password