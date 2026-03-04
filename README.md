# Task Manager

A Laravel 11 web application with user authentication and complete CRUD functionality for managing tasks.

## Tech Stack

- **Framework:** Laravel 11
- **Database:** MySQL
- **Authentication:** Laravel Breeze
- **Frontend:** Blade Templates + Tailwind CSS
- **Language:** PHP 8.2

## Features

- ✅ User Registration, Login, Logout, Password Reset
- ✅ Create, Read, Update, Delete Tasks
- ✅ Task status management (Pending, In Progress, Completed)
- ✅ Paginated task list (10 per page)
- ✅ Flash messages on every action
- ✅ Form validation with error display
- ✅ Only authenticated users can access tasks
- ✅ Guests can only see login/register pages

## Requirements

- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM
- XAMPP (or any local server)
- mailtrap just for testing the password reset email testing

## Installation Steps

### 1. Clone the repository
```bash
git clone https://github.com/YOUR_USERNAME/task-manager.git
cd task-manager
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Install Node dependencies
```bash
npm install
```

### 4. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Database
Open `.env` file and update these values:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_app
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Create Database
Open phpMyAdmin at `localhost/phpmyadmin` and create a database named `task_app`

### 7. Run Migrations
```bash
php artisan migrate
```

### 8. Optional - Seed fake data for testing pagination
```bash
php artisan db:seed --class=TaskSeeder
```

### 9. Run the application
Open two terminals and run:
```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev (needed for tailwind to work)
```

Visit `http://localhost:8000`

## Environment Setup

| Variable | Value |
|---|---|
| DB_CONNECTION | mysql |
| DB_HOST | 127.0.0.1 |
| DB_PORT | 3306 |
| DB_DATABASE | task_app |
| DB_USERNAME | root |
| DB_PASSWORD | (empty for XAMPP) |

## Migration Commands
```bash
# Run migrations
php artisan migrate

# Rollback last migration
php artisan migrate:rollback

# Fresh migration (drops all tables and re-runs)
php artisan migrate:fresh

# Fresh migration with seeder
php artisan migrate:fresh --seed
```

## Database Structure

### Tasks Table

| Column | Type | Description |
|---|---|---|
| id | bigint | Auto increment primary key |
| title | varchar(255) | Task title (required) |
| description | text | Task description (optional) |
| status | enum | pending, in_progress, completed |
| created_at | timestamp | Auto generated |
| updated_at | timestamp | Auto generated |

## Folder Structure
```
app/
├── Http/
│   ├── Controllers/
│   │   └── TaskController.php
│   └── Requests/
│       └── Task/
│           ├── StoreRequest.php
│           └── UpdateRequest.php
├── Models/
│   └── Task.php
database/
├── migrations/
│   └──create_tasks_table.php
└── seeders/
    └── TaskSeeder.php
resources/
└── views/
    ├── layouts/
    │   ├── app.blade.php
    │   └── navigation.blade.php
    └── tasks/
        ├── index.blade.php
        ├── form.blade.php
        └── show.blade.php
routes/
└── web.php
```

## Application URLs

| URL | Method | Description |
|---|---|---|
| / | GET | Redirects to login |
| /register | GET | User registration page |
| /login | GET | User login page |
| /dashboard | GET | Dashboard (auth required) |
| /tasks | GET | Task list (auth required) |
| /tasks/create | GET | Create task form (auth required) |
| /tasks/{id} | GET | View task detail (auth required) |
| /tasks/{id}/edit | GET | Edit task form (auth required) |

## Screenshots

> Register → Login → View Tasks → Create Task → Edit Task → Delete Task

