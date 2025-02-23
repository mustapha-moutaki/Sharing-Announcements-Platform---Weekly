# Weekly - Ads Platform

Weekly is a web platform where users can post, view, and comment on ads. The application is built using **Laravel 11** and follows best practices for robust and secure development.

## Project Goal 🎯

The goal of this project is to enable users to create, manage, and interact with ads. The main features include:

- **User management**: Secure authentication with **Laravel Breeze/Jetstream**.
- **Full CRUD for ads**: Create, read, update, and delete (with **soft delete**).
- **Category management**: Categorize ads into different categories.
- **Comments**: Add comments to each ad.
- **Testing and development**: Use artisan tools, seeders, factories, and REPL (Tinker).

---
![Project Screenshot](https://github.com/mustapha-moutaki/Sharing-Announcements-Platform---Weekly/blob/286955ea381a2d532d2e468341ecce9d3b034827/kingmorder.png)

## Technologies and Tools 🛠

- **Framework**: Laravel 11 (latest stable version)
- **Database**: MySQL / PostgreSQL
- **Frontend**: Blade + Tailwind CSS (via Laravel Breeze / Jetstream)
- **Authentication**: Laravel Breeze / Jetstream / UI
- **Development tools**:
  - `php artisan make:model -mcr` (Models, Migrations, Controllers, Requests)
  - `php artisan make:seeder` & `php artisan make:factory` (Test data)
  - `php artisan tinker` (REPL for testing queries)
  - Eloquent ORM for data manipulation

---

## Project Architecture 📌

### 1️⃣ User Management (users)

- **Model**: `User`
- **Fields**:
  - `id` (PK)
  - `name`
  - `email` (unique)
  - `password`
  - `role` (admin, user) (bonus)
  - `timestamps`
- **Features**:
  - Sign-up / Login
  - Profile management
  - Middleware to restrict certain pages

---

### 2️⃣ Ads Management (annonces)

- **Model**: `Annonce`
- **Fields**:
  - `id` (PK)
  - `title`
  - `description`
  - `price` (optional)
  - `image` (optional)
  - `user_id` (FK → users)
  - `category_id` (FK → categories)
  - `status` (active, draft, archived)
  - `deleted_at` (Soft Delete)
  - `timestamps`
- **Features**:
  - Display and create ads
  - Edit and delete (soft delete)
  - Pagination (->paginate(10))

---

### 3️⃣ Category Management (categories)

- **Model**: `Categorie`
- **Fields**:
  - `id` (PK)
  - `name` (unique)
  - `slug` (SEO-friendly)//optional
  - `timestamps`
- **Features**:
  - Display categories
  - Link an ad to a category

---

### 4️⃣ Comments Management (comments)

- **Model**: `Commentaire`
- **Fields**:
  - `id` (PK)
  - `content`
  - `user_id` (FK → users)
  - `annonce_id` (FK → annonces)
  - `timestamps`
- **Features**:
  - Add a comment to an ad
  - Delete own comments
  - Validation system before submission

---

## Artisan Commands Used 🛠

1. **Generate Models and Migrations**:
   ```bash
   php artisan make:model Annonce -mcr
   php artisan make:model Categorie -mcr
   php artisan make:model Commentaire -mcr
Add Factories and Seeders:

Create a seeder to populate the database with test data:
bash
Copy
Edit
php artisan make:seeder AnnonceSeeder
php artisan make:seeder CategorieSeeder
php artisan make:seeder CommentaireSeeder
Create a factory to generate random data:
bash
Copy
Edit
php artisan make:factory AnnonceFactory
php artisan make:factory CategorieFactory
php artisan make:factory CommentaireFactory
Use Tinker (REPL) for testing queries:

bash
Copy
Edit
php artisan tinker
Best Practices ✅
User input validation: Use Form Requests to validate data before submission.
Middleware: Secure pages with middleware to restrict access.
Soft Delete: Use soft delete to avoid permanent deletion of ads.
Eloquent Relationships: Use Eloquent relationships to manage the connections between models (User, Ad, Comment, Category).
Installation 📦
Prerequisites
PHP >= 8.0
Composer
Laravel 11
Database (MySQL / PostgreSQL)
Installation Steps
Clone the repository:

bash
Copy
Edit
git clone https://github.com/mustapha-moutaki/weekly.git
cd weekly
Install dependencies:

bash
Copy
Edit
composer install
Configure the .env file: Copy the .env.example file to .env:

bash
Copy
Edit
cp .env.example .env
Configure your database and other parameters in .env.

Generate the application key:

bash
Copy
Edit
php artisan key:generate
Run migrations:

bash
Copy
Edit
php artisan migrate
Run seeders to add test data:

bash
Copy
Edit
php artisan db:seed
Start the development server:

bash
Copy
Edit
php artisan serve
Access the Application
Visit http://localhost:8000 in your browser.

Contributing 🤝
If you would like to contribute to this project, follow these steps:

Fork the repository.
Create a new branch (git checkout -b feature/my-feature).
Make your changes.
Submit a pull request detailing the changes made.
