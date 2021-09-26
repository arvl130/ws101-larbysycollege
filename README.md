# 🍋 Larby Sy College School Website 📖

This is a finals project for WS101 on building a school website for a taget company.

The project is based on PHP and MariaDB.

## 🔧 Setup

Before running the project, create the required tables in MariaDB:
```
CREATE TABLE login (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255),
    midname VARCHAR(255),
    lastname VARCHAR(255),
    birthday VARCHAR(255),
    gender VARCHAR(255),
    course VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
); 
CREATE TABLE message_db (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    message VARCHAR(255),
    email VARCHAR(255)
);
```

To run the project, PHP needs to be in your `PATH`:
```
$ php --version
```

For deployment, you will also need Rsync:
```
$ rsync --version
```

## 🚀 Usage

This project reads the following environment variables during runtime.

`DB_NAME`: Sets the database name. Default: `school_db`

`DB_PASSWORD`: Sets the database password. Default: (empty)

`PORT`: Sets the port the project will run on. Default: 8000

You may want to set some of these environment variables before starting the project.

To run the project, run the following command:
```
$ ./setup run
```

To deploy the project into an htdocs directory, run the command:
```
$ ./setup deploy /path/to/htdocs
```
