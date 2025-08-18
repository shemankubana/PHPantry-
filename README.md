# Simple Laravel E-commerce Project 🛒

This is a demonstration of a basic e-commerce application built with the Laravel PHP framework, featuring a public storefront for browsing and purchasing products, and a secure admin panel for managing product inventory. The project showcases fundamental concepts of web development, including MVC architecture, database interaction, session management, and a clean, responsive user interface.

-----

## ✨ Features

  * **Public Storefront**:
      * Displays a list of products with names, descriptions, prices, and images.
      * Allows users to add products to a session-based shopping cart.
      * Provides functionality to remove items from the cart.
      * Includes a mock checkout process to "place" an order and clear the cart.
  * **Admin Panel**:
      * **Simple Authentication**: A hardcoded login (for demo purposes) to access the admin features.
      * **Product Management**:
          * **Add New Products**: Form to add product details (name, description, price, image URL) to the database.
          * **Delete Existing Products**: Ability to remove products from the inventory.
-----

## 🚀 Technologies Used

  * **Backend**:
      * **PHP 8.x**: The core programming language.
      * **Laravel 10.x+**: A powerful PHP framework for rapid application development.
      * **MySQL**: Relational database management system for storing product and potential order data.
      * **PDO**: PHP Data Objects for secure database interactions.
      * **Eloquent ORM**: Laravel's elegant Object-Relational Mapper for interacting with the database using PHP objects.
  * **Frontend**:
      * **Blade Templating Engine**: Laravel's simple, yet powerful templating engine for dynamic HTML.
      * **Tailwind CSS**: A utility-first CSS framework (used via CDN) for responsive and modern styling.

-----

## 🛠️ Setup Instructions

Follow these steps to get the project up and running on your local machine.

### Prerequisites

  * **PHP** (8.1 or higher)
  * **Composer** (PHP dependency manager)
  * **MySQL** (or MariaDB) database server
  * A web server (e.g., Apache, Nginx) or Laravel's built-in development server.

### Installation Steps

1.  **Clone the Repository**:

    ```bash
    git clone https://github.com/shemankubana/PHPantry-
    cd ecommerce-laravel
    ```

2.  **Install Composer Dependencies**:

    ```bash
    composer install
    ```

3.  **Environment Configuration**:

      * Copy the example environment file:
        ```bash
        cp .env.example .env
        ```
      * Open the newly created `.env` file and configure your database connection:
        ```dotenv
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=ecommerce_db  # Ensure this database exists in MySQL
        DB_USERNAME=root          # Your MySQL username
        DB_PASSWORD=              # Your MySQL password (leave empty if none)
        ```
      * Generate a unique application key:
        ```bash
        php artisan key:generate
        ```
      * **Clear Configuration Cache**: If you made changes to `.env` after initial setup, always run:
        ```bash
        php artisan config:clear
        ```

4.  **Database Setup**:

      * Ensure your MySQL server is running.
      * **Create the database** `ecommerce_db` if it doesn't already exist. You can do this via phpMyAdmin, MySQL Workbench, or the MySQL command line:
        ```sql
        CREATE DATABASE ecommerce_db;
        ```
      * **Run Migrations**: This will create the `products` table in your database.
        ```bash
        php artisan migrate
        ```
-----

## ▶️ Running the Application

1.  **Start the Laravel Development Server**:

    ```bash
    php artisan serve
    ```

    This will typically start the server at `http://127.0.0.1:8000`.

2.  **Access the Storefront**:
    Open your web browser and navigate to: `http://127.0.0.1:8000`

3.  **Access the Admin Panel**:
    Open your web browser and navigate to: `http://127.0.0.1:8000/admin`

-----

## 🔒 Admin Panel Credentials

For demonstration purposes, a simple hardcoded login is used:

  * **Username**: `admin`
  * **Password**: `password`

*Note: In a real-world application, authentication would involve user registration, password hashing, and more robust security measures.*

-----

## 💡 Future Enhancements

  * **User Authentication & Authorization**: Implement Laravel's built-in authentication system (`laravel/breeze` or `laravel/jetstream`) for user registration, login, and proper admin role management.
  * **Image Uploads**: Instead of external image URLs, implement local storage or cloud storage (e.g., AWS S3) for product images.
  * **Order Management**: Create database tables and logic to persist orders after checkout, allowing admins to view order history.
  * **Product Categories**: Add categories to products for better organization and filtering.
  * **Search & Filtering**: Implement search functionality and filters for products.
  * **Payment Gateway Integration**: Integrate with real payment processors (e.g., Stripe, Flutterwave).
  * **Improved Cart Management**: Allow users to update product quantities in the cart.
  * **Testing**: Add more comprehensive unit and feature tests using PHPUnit.
  * **Frontend Framework**: Integrate a JavaScript framework like Vue.js or React for a more dynamic and interactive user interface.