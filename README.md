# BlogYaari — Blog Management System

## Why I Built It This Way

I come from a Node.js and Express background. When I received this assignment, I had no prior PHP or Laravel experience. Instead of pretending otherwise, I made a deliberate choice — I would use my existing knowledge of backend architecture, MVC patterns, and database design to drive the project, and use AI as a syntax assistant for PHP, the same way any developer uses documentation.

Every architectural decision in this project — the database schema, the route structure, the authentication flow, the AJAX filtering logic — was planned by me first, mapped from concepts I already understood in Express, and then implemented in Laravel. I believe this is how modern developers actually work, and I wanted to be transparent about that.

The result is a fully functional, deployed Blog Management System that meets every requirement in the assignment. I also believe this approach shows something more valuable than memorized syntax — it shows how I think, how I adapt, and how I ship.

---

## Live Demo

- Website: https://your-live-url.infinityfreeapp.com
- Admin Panel: https://your-live-url.infinityfreeapp.com/admin
- Admin Email: admin@blogyaari.com
- Admin Password: admin123

---

## Features

**User Side**
- View all blogs on the home page, fetched dynamically from the database
- Filter blogs by category (Admit Card, Result, Other) using AJAX — no page reload
- Filter blogs by date using AJAX — no page reload
- Search blogs by title in real time
- Read full blog articles with rich text content
- Upvote blogs without page reload (AJAX)
- Comment on blogs when logged in
- Register and login with email and password
- View and update your profile (name, username, email)
- Create, edit, and delete your own blog posts
- Rich text editor (Quill.js) for formatting posts with bold, italic, lists, and images
- View your post performance — upvote count and comment count per post

**Admin Side**
- Separate admin panel accessible only to admin users
- Dashboard showing total blogs, users, and comments
- View and delete any blog post on the platform
- Admin role assigned via database (is_admin flag)

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.3, Laravel 13 |
| Database | MySQL 8.0 |
| Frontend | Blade Templates, Tailwind CSS (CDN) |
| Interactivity | jQuery, AJAX |
| Rich Editor | Quill.js (CDN) |
| Auth | Custom (no Breeze — needed username + admin role) |
| Deployment | InfinityFree |
| Version Control | Git + GitHub |

---

## Database Schema

**users** — id, name, username, email, password, is_admin, timestamps

**blogs** — id, user_id, title, short_description, content, image, category, other_category, published_date, upvotes, timestamps

**comments** — id, blog_id, user_id, text, timestamps

---

## Project Structure

```
blog-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── BlogController.php
│   │   │   ├── CommentController.php
│   │   │   ├── AdminController.php
│   │   │   ├── ProfileController.php
│   │   │   └── Auth/
│   │   │       ├── LoginController.php
│   │   │       └── RegisterController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── Blog.php
│       ├── Comment.php
│       └── User.php
├── database/migrations/
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── auth/
│   ├── blogs/
│   ├── profile/
│   └── admin/
└── routes/web.php
```

---

## Local Setup

### Requirements
- PHP 8.3
- Composer
- MySQL

### Steps

```bash
# Clone the repository
git clone https://github.com/yourusername/blog-system.git
cd blog-system

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Configure your database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_system
DB_USERNAME=root
DB_PASSWORD=

# Run migrations
php artisan migrate

# Link storage for image uploads
php artisan storage:link

# Start the server
php artisan serve
```

Then open `http://127.0.0.1:8000` in your browser.

### Creating an Admin User

```bash
php artisan tinker
```

```php
$user = App\Models\User::where('email', 'your@email.com')->first();
$user->is_admin = true;
$user->save();
```

---

## AJAX Implementation

The filter and search on the home page uses jQuery AJAX to fetch filtered results from the backend without any page reload. This was a core requirement and is implemented in `blogs/index.blade.php`:

- Category filter triggers an AJAX GET request to `/blogs/filter`
- Date filter triggers the same endpoint with a date parameter
- Search input triggers the request after a 500ms debounce
- The backend `BlogController@filter` method queries the database and returns JSON
- jQuery replaces the blog grid HTML with the new results

The upvote button on the blog detail page also uses AJAX POST to increment the count without reload.

---

## What I Learned

This project taught me that the fundamentals of backend development transfer across languages. Routes, controllers, middleware, ORM queries, authentication — these exist in Express and in Laravel. The concepts are identical, only the syntax differs. Given more time, I plan to go deeper into core PHP and Laravel internals. I am confident I can do that within a week of joining.

---

## Author

Built by Harshit Singh for the JobYaari PHP/Laravel Developer Intern Assessment.
