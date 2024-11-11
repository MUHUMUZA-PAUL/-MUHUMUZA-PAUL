<?php
// Start the session
session_start();

// Include your database connection file
// include('db_connect.php'); // Uncomment and provide database connection if needed

// Initialize variables for error messages
$error_message = '';
$success_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Input validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = 'All fields are required!';
    } elseif ($password !== $confirm_password) {
        $error_message = 'Passwords do not match!';
    } else {
        // Hash the password for storage in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Example: Check if the username or email already exists (replace with actual DB queries)
        // $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        // $result = mysqli_query($conn, $query);
        // if (mysqli_num_rows($result) > 0) {
        //     $error_message = 'Username or Email already exists!';
        // } else {
            // Insert new user into the database
            // Example: $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            // mysqli_query($conn, $query);

            // For now, just display a success message
            $success_message = 'Registration successful! You can now log in.';
            // Redirect to login page after success (optional)
            // header("Location: login.php");
            // exit();
        //}
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Task Tracker System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Register for Task Tracker</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error_message)): ?>
                            <div class="alert alert-danger"><?= $error_message; ?></div>
                        <?php elseif (!empty($success_message)): ?>
                            <div class="alert alert-success"><?= $success_message; ?></div>
                        <?php endif; ?>
                        
                        <form method="POST" action="register.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="login.php" class="text-decoration-none">Already have an account? Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
