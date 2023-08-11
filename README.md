# Contact Form Development

This project implements a simple contact form using HTML and PHP. The form validates user input, saves form data to a MySQL database table, and sends an email notification to the site owner.

## Requirements

- PHP
- MySQL
- Web server (e.g., Apache)

## Setup Instructions

1. **Database Setup:**

   - Create a MySQL database using SQL Query.
   - Replace 'your_username', 'your_password', and 'your_database' placeholders in `process_form.php` with your actual database credentials.

2. **Web Server Setup:**

   - Place the project files in your web server's root directory.
   - Make sure PHP is properly configured on your web server.

3. **Running the Application:**

   - Access the application by opening `index.php` in a web browser.
   - Fill out the form and submit. Form data will be validated, saved to the database, and an email notification will be sent.

## Notes

- The project does not use any PHP frameworks or libraries.
- JavaScript is not used in this project.
- Form validation is done on the server-side using PHP.

