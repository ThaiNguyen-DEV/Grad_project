# LOTUSMILE
> **Tour Booking Website with Personalized Recommendations**

## Overview
**LOTUSMILE** is a comprehensive tour booking platform designed to streamline the travel planning experience. By leveraging a personalized recommender system, it suggests tailored tour options based on user preferences and booking history. The system also features a powerful administration dashboard for managing tours, users, and business analytics.

---

## Key Features

### For Users
*   **Smart Search**: Filter tours by destination, price, duration, and keywords.
*   **Personalized Suggestions**: Receive detailed recommendations based on your unique profile.
*   **Seamless Booking**: Easy-to-use booking flow for individuals and families.
*   **User Dashboard**: Manage your profile, view booking history, and handle account settings.
*   **Social & Secure Login**: Sign in with Google/Facebook or use traditional secure email authentication.

### For Administrators
*   **Tour Management**: Full CRUD capabilities for tours, including availability, itineraries, and media.
*   **User Oversight**: Monitor user activity, manage accounts, and handle moderation.
*   **Campaign Management**: Create and track promotions and discount codes.
*   **Analytics Dashboard**: Visual reports on revenue, booking trends, and system performance.

---

## Tech Stack

**Frontend**
*   **Core**: HTML5, CSS3, JavaScript, Bootstrap
*   **Interactivity**: AJAX, jQuery
*   **Templating**: Laravel Blade

**Backend**
*   **Framework**: PHP (Laravel)
*   **Database**: MySQL
*   **Authentication**: Laravel Socialite (Google/Facebook), Standard Auth

---

## Getting Started

### Prerequisites
*   [PHP](https://www.php.net/) 8.x
*   [Composer](https://getcomposer.org/)
*   [MySQL](https://www.mysql.com/)
*   [Node.js](https://nodejs.org/) & NPM

### Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/ThaiNguyen-DEV/Grad_project.git
    cd Graduation_Project
    ```

2.  **Install dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Configure your `.env` file with your database and mail credentials.*

4.  **Database Setup**
    ```bash
    php artisan migrate --seed
    ```

5.  **Build Assets & Run**
    ```bash
    npm run build
    php artisan serve
    ```
    Visit `http://localhost:8000` to start exploring.

---

## Project Structure

*   `app/`: Core application logic (Models, Controllers)
*   `database/`: Migrations & Seeders
*   `resources/`: Views (Blade) & raw assets
*   `routes/`: Web & API route definitions
*   `public/`: Compiled assets & entry point

