<h1 style="text-align: center">Organization and order recorder</h1>
<p style="text-align: center">A simple program that lets you log companies and their orders</p>

<h1>Requirements:</h1>

- Git
- Node.js >= 18.07
- PHP >= 8.0
- MySQL >= 8.0.30
- composer 2.2.6

<h1>Instalation</h1>

1. Installing PHP on the system. Installation guides for all systems can be found here: https://www.php.net/manual/en/install.php
2. Installing Git on the system. Installation guides for all systems can be found here: https://github.com/git-guides/install-git
3. Downloading and installing composer. Command line: Download: ```php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"``` Local install: ```php composer-setup.php``` Global install: ```php composer-setup.php --install-dir=/usr/local/bin --filename=composer``` Test: composer Or use the installer from https://getcomposer.org/
4. To add a database to the project you will need to install MySql. Installation guide: https://ubuntu.com/server/docs/databases-mysql
5. create a schema by using ```CREATE DATABASE db_name;```
6. Copy the code from Github: ``` git clone https:///github.com/RaymondNalezitij/OrganizationAndOrderRecorder.git ```
7. Finally, we will need npm which comes with Node.js. Node.js installation guide can be found here https://nodejs.org/en/
8. To finish npm installation run:
    - ```npm install```
    - ```npm run build```

9. Install the needed dependencies using: ```composer install```
10. Go to project directory rename the .env.example to .env and if needed change the:

    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD

    to the parameters that you have set for your mysql

11. Go to project directory and in your terminal run : ```php artisan migrate --seed```

12. To run the project in your terminal go to project directory and run : ```php artisan serve```

<h1>After starting:</h1>

The page link is http://127.0.0.1:8000
