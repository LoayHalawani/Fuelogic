<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/lb-BanK/">
    <link href="./css/signup.css" rel="stylesheet">
    <title>Sign up</title>
</head>
<body>
    <div class="signup-box">
        <div class="inputs-box">
            <div class="upper-part">
                <h2 style="color: #0a67fec6;">Sign up</h2>
            </div>
            <div class="middle-part">
                <form action="signup" method="POST">
                    <input type="text" name="username" placeholder="Username">
                    <input type="text" name="first_name" placeholder="First name">
                    <input type="text" name="last_name" placeholder="Last name">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="phone_nb" placeholder="Phone number">
                    <input type="text" name="password" placeholder="Password">
                    <input type="submit" value="Submit" class="submit-btn">
                </form>
            </div>
            <a href="login">login</a>
        </div>
    </div>
</body>
</html>

<?php
$servername = "localhost"; // Your database server (could be different)
$dbusername = "hadikaraki";
$dbpassword = "h@dikarMYSQL_";
$dbname = "fuelogic";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_nb = $_POST['phone_nb'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $sql = "SELECT email, username FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);

    // Check if the query preparation failed
    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);  // Show the error message
    }

    // Bind the parameters (username and email)
    $stmt->bind_param("ss", $username, $email);

    // Execute the statement
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "Username or email already exists";
    } else {
        // Insert the new user into the database
        $insert_sql = "INSERT INTO users (first_name, last_name, email, phone_nb, username, hashed_password) 
                       VALUES (?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);

        // Check if the query preparation for insert failed
        if ($insert_stmt === false) {
            die('Prepare failed: ' . $conn->error);  // Show the error message
        }

        // Bind the user inputs to the insert query
        $insert_stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone_nb, $username, $hashed_password);

        // Execute the insert statement
        if ($insert_stmt->execute()) {
            echo "New user registered successfully";
        } else {
            echo "Error: " . $insert_stmt->error;
        }

        // Close the insert statement
        $insert_stmt->close();
    }

    // Close the select statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>