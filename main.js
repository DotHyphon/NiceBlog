const mysql = require('mysql');

// Replace the placeholders with your database details
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'your_username',
    password: 'your_password',
    database: 'your_database_name'
});

signUp();


function signUp() {
    connection.connect();

    // Define the SQL query using a parameterized query
    const sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';

    // Define the user data as an array
    const userData = ['John Doe', 'john@example.com', 'password123'];

    // Execute the parameterized query with the user data
    connection.query(sql, userData, function (error, results, fields) {
        if (error) throw error;
        console.log('New record created successfully');
    });

    connection.end();
    console.log('Connection closed');
}