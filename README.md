# PHP CRUD Demonstration

> This sample project demonstrate how CRUD operation can preform with MySQL database and PHP.

## Pre-Requirements

> ``PHP(8.0)``, ``MySQL(8.0)`` web environment (Eg:Wamp/Xampp localhost)

## Database Setup

```MySQL
# Create database
CREATE DATABASE IF NOT EXISTS php_crud_demo;

# Use it for create a table
USE php_crud_demo;

# Table creation
CREATE TABLE IF NOT EXISTS user_info
(
    user_id    int          NOT NULL AUTO_INCREMENT,
    first_name varchar(100) NOT NULL,
    last_name  varchar(100) NOT NULL,
    degree     char(2)      NOT NULL COMMENT 'CS/IS',
    PRIMARY KEY (`user_id`)
);

# Insert dummy data
INSERT INTO user_info (user_id, first_name, last_name, degree)
VALUES (3, 'Saman', 'Rathdeniya', 'IS'),
       (4, 'Mohan', 'Fernando', 'CS'),
       (5, 'Kasun', 'Silva', 'IS'),
       (6, 'Dimuthu', 'Disanayake', 'CS');
```

## File Structure

```
.
|--- assets
|    |--- Database.php
|    |--- User.php
|    |--- style.css
|--- index.php
|--- listUsers.php
|--- insertUser.php
|--- editUser.php
|--- deleteUser.php
|--- README.md
|--- LICENSE
```

## Configuration

> After the background setup, this system may work if your database has user ``root`` with ``no password`` configuration. If you can see the below error, you have to configure ``./assets/Database.php`` file accordingly.

```
Warning: mysqli::__construct(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: YES)
```

> Based on your MySQL database server configure ``server``, ``userName`` and ``password`` parameters.

```php
private static string $server = "localhost"; //server
private static string $database = "php_crud_demo"; //database
private static string $userName = "root"; //database username
private static string $password = ""; // database user's password
```
