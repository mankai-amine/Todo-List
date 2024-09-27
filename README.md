# Task Manager :  
A full-stack web application designed to help individuals manage their tasks efficiently. 
## Technologies:
- PHP with Fat-Free Framework (F3)
- MySQL
- HTML5
- CSS3
- Bootstrap
- JQuery
## Features:
- Home page
- Contact Us page
- User registration and authentication
- Registered user section where users can manage their profile and delete their account
- Tasks section where authenticated users can view, add, update, remove, and filter tasks
- Session was used to keep the user logged in
- A user who is not logged can't access the “account” and “tasks” pages 

## How to run the app:
To run this PHP application locally, you will need a web server and a database. While this app was developed using **MAMP**, you are free to use other local development environments such as XAMPP or WAMP.
- Clone the repository to your local machine
- Start the MAMP application and ensure that both the Apache and MySQL servers are running
- Open phpMyAdmin by navigating to http://localhost/phpmyadmin
- Create a new database and import the provided SQL file
- Create an access.ini file in the root directory of the project and add your configuration:  
  [globals]
  * DBNAME= the database name
  * DBUSER= the database username
  * DBPASS= the database password
  * DBPORT= the database port (default is 3306)
