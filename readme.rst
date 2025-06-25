## Features
  - Add, edit, delete, and list phonebook entries
  - Fields: `Name`, `Phone`, `Status` (Online/Offline)
  - Pagination and search
  - Bootstrap, Toastr

## Requirements
  - PHP 7.4
  - MySQL

## Installation Steps
1. Clone the repository
  git clone https://github.com/your-username/your-repo.git

2. Configure your base URL
  $config['base_url'] = 'http://localhost/phonebook/'; // Adjust to your local or production path

3. Setup the database (application/config/database.php)

  'hostname' => 'localhost',
  'username' => 'root',
  'password' => '',
  'database' => 'phone_book',

4. Enable Mod_Rewrite (for clean URLs), add .htaccess file in the root folder with the following code:

    <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteBase /ci3/
    
        # Redirect Trailing Slashes
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^(.*)$ index.php/$1 [L]
    </IfModule>

5. Run the app in browser
  http://localhost/phonebook/
