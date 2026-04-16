# Porichoy
> Let Them Know

## Description

**Porichoy** (Bengali for 'Identity') is a dynamic, modular, and highly customizable personal portfolio application built with the Laravel framework. It provides a robust platform for professionals of any field—developers, designers, writers, and more—to showcase their skills, experience, and projects to the world.

With a powerful admin panel and a flexible, profession-aware module system, Porichoy allows you to build and manage a personal website that truly represents your unique identity.

## Features

Porichoy comes packed with features designed for flexibility and ease of use:

* **Powerful Admin Dashboard:** A secure and comprehensive backend to manage all content, settings, and modules.
* **Dynamic Theming:** Instantly change the look and feel of your entire portfolio. The system is built to support multiple themes, allowing you to switch designs in a single click.
* **Complete Module System:** Your portfolio is built from modules. You can easily enable, disable, and reorder sections like:
    * Education
    * Work Experience
    * Projects
    * Skills
    * Testimonials
    * Blog / Articles
    * ...and more.
* **Profession-Based Configuration:** Tailor your portfolio's structure based on your career. A developer might want to highlight a GitHub repository, while a photographer might prioritize a gallery module.
* **Built-in Contact Form:** A ready-to-use contact form that sends messages directly to you, with validation and spam protection (if configured).
* **SEO Optimized:** Clean markup and management for meta titles and descriptions to help you get discovered on search engines.
* **Fully Responsive:** All default themes are designed to look great on desktops, tablets, and mobile devices.
* **Social Media Integration:** Easily link and display your profiles from platforms like LinkedIn, GitHub, Twitter, etc.

## Installation Guide

You can get your own instance of Porichoy up and running by following these steps.

### Prerequisites

* PHP >= 8.2
* Composer
* Node.js & NPM
* MySQL

### Steps

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/yenHunter/Porichoy.git
    cd porichoy
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Create your environment file:**
    ```bash
    cp .env.example .env
    ```

4.  **Generate your application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Configure your `.env` file:**
    Open the `.env` file and set up your database connection (DB_DATABASE, DB_USERNAME, DB_PASSWORD) and other settings.

    **Important:** For the contact form and spam protection, add your Google ReCAPTCHA v3 keys. You can get these from the [Google ReCAPTCHA](https://developers.google.com/recaptcha).

    ```dotenv
    # .env

    APP_URL=http://your-domain.com

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE='your-db-name'
    DB_USERNAME='your-db-user'
    DB_PASSWORD='your-db-password'

    # Add your Google ReCAPTCHA keys here
    RECAPTCHA_SITE_KEY=YOUR_RECAPTCHA_SITE_KEY_HERE
    RECAPTCHA_SECRET_KEY=YOUR_RECAPTCHA_SECRET_KEY_HERE
    ```

6.  **Run database migrations:**
    This will create all the necessary tables in your database.
    ```bash
    php artisan migrate --seed
    ```

7.  **Serve the application:**
    ```bash
    php artisan serve
    ```

Your application should now be running at `http://127.0.0.1:8000`.

## About Me

I’m a passionate web developer with experience in building scalable and secure applications. I specialize in Laravel, Django, JavaScript and server management with Nginx. I enjoy automating workflows, optimizing performance, and deploying modern web solutions on VPS environments. I believe in clean code, continuous learning, and sharing knowledge through open-source contributions.

## Connect & Support

[![LinkedIn](https://img.shields.io/badge/LinkedIn-Connect-blue?style=for-the-badge&logo=linkedin)](https://www.linkedin.com/in/firoz-ebna-jobaier)
[![Buy Me a Coffee](https://img.shields.io/badge/Buy_Me_a_Coffee-Support-yellow?style=for-the-badge&logo=buymeacoffee)](buymeacoffee.com/yenHunter)
[![Fork me on GitHub](https://img.shields.io/badge/Fork_on_GitHub-000?style=for-the-badge&logo=github)](https://github.com/yenHunter)

## Contributing

Contributions are welcome! If you'd like to help improve Porichoy, please feel free to fork the repository, make your changes, and submit a pull request.

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).