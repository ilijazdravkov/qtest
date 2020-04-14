# qtest

# Requirements

 1. PHP v7.4 installed
 2. Composer installed
 
 # Installation

1. Clone or download the project
2. Database file db.sql is in the root of the project, import in your local mysql server
3. Create user with user credentials from config/database.php and grant all priviligies to the specified db
4. In Terminal/Command Prompt go to the project root path (ex. cd ~/qtest)
5. Run command 'composer install'
6. Run command 'composer dump-autoload -o'
7. Start the php build in server with command 'php -S localhost:8000'
8. In browser type http://localhost:8000/ to access the web app
