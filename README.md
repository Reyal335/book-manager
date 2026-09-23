# Book Manager Crud App

### Contents
1. Purpose
2. Setup
3. Notes

## Purpose

This is a book manager crud app developed as per instructions for the Technical Exam for the Web Dev postiong for the PMC Group. It features full CRUD functionality along with the bonus tasks: 

    -Search functionality (Author and book use one search bar)
    -Used Laravel factory for testing schemas and seed for populating data during datbase migration
    -AJAX implementation in formss


## Setup

### Repository Requirements
1. PHP 8.3+
2. Composer
3. Node.js and npm

4. PHP SQLite/PDO extension

**If not yet configured**

Find the active php.ini

```
php --ini
```

```
Loaded Configuration File:         "C:\php-8.5.10\php.ini"
```

Look for and open that file

Enable SQLITE extensions by uncommenting pdo_sqlite and sqlite3

5. Git

In you desired directory

**Clone and setup**
```
git clone <repository-url>
cd book-manager
```



**Install php dependencies**
```
composer install
```



**Create the environment file**

For Linux/macOs (or in Git Bash)

```
cp .env.example .env
php artisan key:generate
```

For PowerShell
```
Copy-Item .env.example .env
php artisan key:generate
```



**Create the SQLite database file:**
```
touch database/database.sqlite
```

or in PowerShell
```
New-Item database/database.sqlite -ItemType File
```

**Run migrations and seed sample data:
```
php artisan migrate --seed
```



**Install and build frontend assets:**
```
npm install 
npm run build
```



**Start the application**
For development with live Vite updates, use two terminals
```
php artisan serve
npm run dev
```

Or use the existing composer script:
```
composer run dev
```

Then opn
```
http://127.0.0.1
```



## Notes
**AI has only been primarily used for extra tailwind styling, html boilerplate and questions beyond documentation; All logic and functionality is mostly manually done for Laravel learning purposes**

**An extras folder has been added containing screenshots of the utilization of Laravel's factory and seeding capabilities**