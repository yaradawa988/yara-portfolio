
#  Yara Portfolio – Personal Web Application

A **personal portfolio website** built using **Laravel 10**, **Tailwind CSS**, and **Blade Templates**.  
This project showcases my skills, services, projects, and includes a full **contact system**, **admin dashboard**, and **Google Login integration**.

---

##  Key Features

-  User Authentication (Login / Register) using **Laravel Breeze**  
-  **Dark Mode** support for better user experience  
-  **Contact Form** with backend messaging system  
-  **Notifications System** for admin and users  
-   **chat-style message UI**  
-  **Admin Dashboard** for managing messages  
-  **Google Login** via Laravel Socialite  
-  Fully **responsive design** for all devices  
-  Portfolio & Projects showcase  
-  **Privacy Policy** & **Terms** pages

---

##  Technologies Used

- **Laravel 10** (PHP Framework)  
- **PHP 8+**  
- **Tailwind CSS** (Styling)  
- **Blade Templates** (Frontend)  
- **MySQL** (Database)  
- **Alpine.js** (Frontend interactivity)  
- **Laravel Breeze** (Authentication scaffolding)  
- **Laravel Socialite** (Google OAuth login)  

---

##  Installation & Setup

To run the project locally, follow these steps:

```bash
# Clone the repository
git clone https://github.com/yaradawa988/yara-portfolio.git
cd yara-portfolio

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
npm run dev

# Copy and configure environment variables
cp .env.example .env
php artisan key:generate

# Run database migrations
php artisan migrate

# Serve the application
php artisan serve

