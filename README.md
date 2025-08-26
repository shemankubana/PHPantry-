# My Simple Laravel E-commerce Project: PHPantry 🛒

This is a little e-commerce demonstration project I put together using the **Laravel PHP framework**. My goal was to build something that showcases the fundamental backend concepts I've been learning, and I think it turned out pretty well\! You'll find a public storefront where folks can browse and "buy" products, and also a neat admin panel where I can manage all the inventory.

-----

## What It Does (Features\!)

I focused on getting these core functionalities working:

  * **Public Storefront**:
      * I've made sure it displays a list of all the products, complete with their names, descriptions, prices, and images.
      * Users can easily add products to a shopping cart, which uses PHP sessions to keep track of everything.
      * You can also remove items from the cart if you change your mind.
      * There's a simple, mock checkout process. It won't charge your credit card (don't worry\!), but it simulates placing an order and clears the cart.
  * **Admin Panel**:
      * I've included a super basic login for the admin side (just for this demo, of course\!).
      * Once logged in, I can **add new products** to the store by filling out a form.
      * I can also **delete existing products** from the inventory.

-----

## The Tech Stack I Used

I built this project to really dive into some key technologies:

  * **Backend**:
      * **PHP 8.x**: My go-to language for this project.
      * **Laravel 10.x+**: This powerful framework really helped me structure everything using the MVC architecture.
      * **PostgreSQL**: I used this relational database to store all the product and session data (Render's managed database offering).
      * **PDO**: I made sure to use PDO for secure database interactions, protecting against SQL injection.
      * **Eloquent ORM**: Laravel's ORM made working with the database feel like magic—much nicer than writing raw SQL\!
  * **Frontend**:
      * **Blade Templating Engine**: Laravel's templating engine was a joy to use for building all the HTML views.
      * **Tailwind CSS**: I grabbed this via a CDN to quickly style everything and make it responsive.

-----

## How to Get It Running on Your Machine (Local Setup)

Want to play around with it locally? Here's how you can get my project up and running:

### Prerequisites

You'll need these installed first:

  * **PHP** (version 8.1 or higher)
  * **Composer** (PHP's package manager)
  * **PostgreSQL** (running locally—remember, I used PostgreSQL for Render, so for consistency, I'd recommend it locally too\!)
  * A web server (like Apache, Nginx, or just Laravel's built-in `php artisan serve`).

### Installation Steps

1.  **Clone My Repository**:

    ```bash
    git clone https://github.com/shemankubana/PHPantry-
    cd ecommerce-laravel
    ```

2.  **Install Composer Dependencies**:

    ```bash
    composer install
    ```

3.  **Environment Configuration**:

      * Copy the example environment file to get started:
        ```bash
        cp .env.example .env
        ```
      * Now, open that `.env` file and set up your **local PostgreSQL database connection**. Make sure these match your local PostgreSQL server:
        ```dotenv
        DB_CONNECTION=pgsql
        DB_HOST=127.0.0.1       # Or 'localhost'
        DB_PORT=5432            # Default PostgreSQL port
        DB_DATABASE=ecommerce_db # Make sure you've created this DB locally!
        DB_USERNAME=your_local_pg_user # Your local PostgreSQL username
        DB_PASSWORD=your_local_pg_password # Your local PostgreSQL password
        ```
      * Generate a unique application key:
        ```bash
        php artisan key:generate
        ```
      * **Clear Configuration Cache**: If you make changes to `.env` after initial setup, always run this:
        ```bash
        php artisan config:clear
        ```

4.  **Database Setup**:

      * Make sure your **local PostgreSQL server** is running\!
      * **Create the database** `ecommerce_db` in your local PostgreSQL if you haven't already. You can use `psql` or a GUI tool:
        ```sql
        CREATE DATABASE ecommerce_db;
        ```
      * **Run Migrations**: This will set up all the necessary tables (like `products` and `sessions`) in your database.
        ```bash
        php artisan migrate
        ```

-----

## How to See It Live (Local & Deployed)

### Locally

1.  **Start the Laravel Development Server**:

    ```bash
    php artisan serve
    ```

    This usually starts the server at `http://127.0.0.1:8000`.


### Deployed on Render\!

I've also deployed this project live on Render\! You can check it out publicly here:

  * **Render Deployment URL**: [https://phpantry.onrender.com/](https://phpantry.onrender.com)

-----

## Admin Panel Credentials

To log into the admin panel (both locally and on Render), use these credentials:

  * **Username**: `admin`
  * **Password**: `password`

-----
