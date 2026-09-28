# Northstar POS

IT0049 Technical Formative Assessment 3: **Forms, Validation, and File Upload**.

This CodeIgniter 4 POS project extends the database-backed account directory from TFA2. It now supports validated customer and user creation, editing existing records, and uploading prepared user avatars.

## Requirements completed

- New Customer form at `/customers/new` with required name and valid email validation.
- New User form at `/users/new` with required name and unique username validation.
- Customer and user edit forms pre-fill existing database values.
- Invalid submissions return to the form with error messages and previous input.
- The `users.avatar` column stores only the generated filename.
- User edit accepts JPG or PNG images up to 2 MB.
- Uploaded images are cropped and saved as display-ready 256 x 256 JPG avatars.
- User listing displays the prepared avatar or a placeholder image.
- CSRF fields, escaped output, Models, Query Builder, migrations, seeders, tests, and a database export are included.

## Requirements

- PHP 8.2+
- CodeIgniter 4.7
- MySQL or MariaDB
- Composer 2
- PHP GD extension enabled for avatar preparation

For XAMPP, open `C:\xampp\php\php.ini`, make sure `extension=gd` has no semicolon, and restart Apache.

## Upgrade an existing TFA2 installation

1. Replace the old project files with this TFA3 project, but keep your private `.env` file.
2. Install dependencies:

   ```bash
   composer install
   ```

3. Add the avatar column without deleting existing accounts:

   ```bash
   php spark migrate
   ```

   If your previous project was not created with migrations, import `database/tfa3_upgrade.sql` in phpMyAdmin instead. Use only one of these two methods.

4. Start the application:

   ```bash
   php spark serve
   ```

5. Open `http://localhost:8080`.

## Fresh setup

1. Install dependencies:

   ```bash
   composer install
   ```

2. Copy `.env.example` to `.env`:

   ```bat
   copy .env.example .env
   ```

3. Create the database:

   ```sql
   CREATE DATABASE it0049_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
   ```

4. Create tables and sample data:

   ```bash
   php spark migrate
   php spark db:seed DatabaseSeeder
   ```

5. Start the application:

   ```bash
   php spark serve
   ```

Alternatively, import `database/it0049_pos.sql` into the `it0049_pos` database. The export recreates the required tables and includes the avatar column.

## Application routes

| Purpose | Method | Route |
| --- | --- | --- |
| Overview | GET | `/` |
| List customers | GET | `/customer-accounts` or `/customers` |
| New customer form | GET | `/customers/new` |
| Create customer | POST | `/customers` |
| Edit customer form | GET | `/customers/{id}/edit` |
| Update customer | POST | `/customers/{id}` |
| List users | GET | `/user-accounts` or `/users` |
| New user form | GET | `/users/new` |
| Create user | POST | `/users` |
| Edit user and avatar | GET | `/users/{id}/edit` |
| Update user and avatar | POST | `/users/{id}` |

## Avatar storage

Prepared avatars are written to `public/uploads/avatars/`. Generated images are excluded from Git, while `placeholder.svg` remains tracked. The database stores only a filename such as `avatar_a1b2c3.jpg`.

## Tests

Create the isolated test database, then run the suite:

```bat
mysql -u root -e "CREATE DATABASE IF NOT EXISTS it0049_pos_test CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
vendor\bin\phpunit --no-coverage
```

## Submission checklist

- Export the final `it0049_pos` database and keep it in `database/it0049_pos.sql`.
- Push the raw project files to GitHub; exclude `vendor/`, `.env`, and generated avatar files.
- Confirm create, validation, edit, upload, placeholder, and avatar display behavior.
- Deploy the same project version and point the host document root to `public/`.
- Add the GitHub repository and hosted application links to the course submission.

## References

- [CodeIgniter Validation](https://codeigniter4.github.io/userguide/libraries/validation.html)
- [CodeIgniter File Uploads](https://codeigniter4.github.io/userguide/libraries/uploaded_files.html)
- [CodeIgniter Image Manipulation](https://codeigniter4.github.io/userguide/libraries/images.html)
