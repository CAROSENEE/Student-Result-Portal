# Student Result Portal

Student Result Portal is a Laravel 9 web application for managing student profiles and academic course results. It provides an authenticated dashboard with student statistics, grade distribution, result history, and full CRUD operations for students and course marks.

## Features

- Portal account authentication with login, remember-me, and logout
- Dashboard with:
  - Enrolled student count
  - Number of courses with recorded results
  - Overall average marks
  - Pass rate
  - Grade distribution
  - Recent result records
- Paginated student directory
- Add, view, edit, and delete student profiles
- Add or update course results for a student
- Automatic letter-grade calculation
- Delete individual course results
- Duplicate course results are prevented for each student
- Cascade deletion of a student's results when that student is deleted

## Demo Video

Watch the [12-second Student Result Portal walkthrough](public/videos/student-result-portal-demo.mp4). The same video is playable on the sign-in page.

## Tech Stack

- PHP 8+
- Laravel 9
- SQLite (default development database)
- Blade templates
- Laravel Mix
- Axios
- PHPUnit

## Grade Scale

| Marks | Grade |
| ---: | :---: |
| 80-100 | A+ |
| 75-79 | A |
| 70-74 | A- |
| 65-69 | B+ |
| 60-64 | B |
| 55-59 | B- |
| 50-54 | C+ |
| 45-49 | C |
| 40-44 | D |
| 0-39 | F |

## Project Structure

- `app/Http/Controllers/` - authentication, student, and result request handling
- `app/Models/` - Eloquent models and grade calculation
- `app/Console/Commands/` - custom portal account creation command
- `database/migrations/` - users, students, and results database schema
- `database/seeders/` - demo student and course result data
- `resources/views/` - Blade templates for login and portal pages
- `routes/web.php` - authenticated and guest routes
- `public/` - compiled assets and public files
- `tests/` - PHPUnit application tests

## Database Schema

### Students

- `name`
- `roll` (unique)
- `department`
- `email` (unique)

### Results

- `student_id` (foreign key with cascade deletion)
- `course_code`
- `marks` (0-100)
- `grade`
- Unique combination of `student_id` and `course_code`

## Installation

### Prerequisites

- PHP 8.0 or newer
- Composer
- Node.js and npm
- SQLite PHP extension

### Setup

1. Clone the repository and enter the project directory:

   ```bash
   cd Student-Result-Portal
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Create the environment file:

   ```bash
   copy .env.example .env
   ```

   On Linux/macOS, use:

   ```bash
   cp .env.example .env
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Create and configure SQLite:

   The example environment uses `DB_CONNECTION=sqlite`. Ensure `database/database.sqlite` exists, then run:

   ```bash
   php artisan migrate
   ```

   To create sample students and course results:

   ```bash
   php artisan db:seed
   ```

6. Create a login account:

   ```bash
   php artisan portal:user
   ```

   Enter a name, email address, and a password of at least 8 characters.

7. Install frontend dependencies and compile assets:

   ```bash
   npm install
   npm run dev
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

Open `http://127.0.0.1:8000` in a browser.

## Available Artisan Commands

```bash
php artisan portal:user
php artisan migrate
php artisan db:seed
php artisan migrate:fresh --seed
php artisan serve
php artisan test
```

## Usage

1. Open the sign-in page.
2. Sign in with the account created through `php artisan portal:user`.
3. Review the dashboard statistics and grade chart.
4. Use **Add student** to create a student.
5. Open a student profile to add or update course marks.
6. Edit or delete student profiles and results as needed.

## Testing

Run the PHPUnit test suite:

```bash
php artisan test
```

Or:

```bash
vendor/bin/phpunit
```
