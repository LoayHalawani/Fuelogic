<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <div class="inputs-box">
            <div class="upper-part">
                <h2 style="color: #0a67fec6;">login</h2>
            </div>
            <div class="middle-part">
                <form action="login" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="text" name="password" placeholder="Password" required>
                    <input type="submit" value="Submit" class="submit-btn">
                </form>
            </div>
            <a href="signup">signup</a>
        </div>
    </div>
</body>
</html>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// change the credentials to fit the MySQL server on xampp on your pc
$servername = "localhost"; // Database server
$dbusername = "hadikaraki"; // Database username
$dbpassword = "h@dikarMYSQL_"; // Database password
$dbname = "fuelogic"; // Database name

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password, user_id, full_name, email FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password, $user_id, $full_name, $email);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            session_start();

            $_SESSION['user'] = [
                'username' => $username,
                'user_id' => $user_id,
                'full_name' => $full_name,
                'email' => $email
            ];

            header("Location: ./");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid username or password!";
        }
    } else {
        // No user found with the given username
        echo "Invalid username or password!";
    }

    $stmt->close();
}

$conn->close();
?>