<?php
// Start the session
session_start();

// Include your database connection file
// include('db_connect.php'); // Uncomment and provide database connection if needed

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simulate database check (replace with actual database code)
    // Example: $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    // You can hash the password for better security in real scenarios.

    if ($username == 'admin' && $password == 'password123') {  // Replace with actual DB check
        // Set session variable for the logged-in user
        $_SESSION['username'] = $username;
        
        // Redirect to the task tracker dashboard
        header("Location: dashboard.php"); // Create dashboard.php for authenticated users
        exit();
    } else {
        // Show error message if login fails
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Task Tracker System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login to Task Tracker</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger"><?= $error_message; ?></div>
                        <?php endif; ?>
                        
                        <form method="POST" action="login.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none">Forgot Password?</a> | 
                            <a href="register.php" class="text-decoration-none">Create an Account</a>
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
