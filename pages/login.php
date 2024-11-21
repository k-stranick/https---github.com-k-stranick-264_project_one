<?php
session_start();
require_once '../database/mysqli_conn.php';

if (isset($_SESSION['user_id'])) {
    header('Location: landing.php');
    exit();
}


// Name: Kyle Stranick
// Course: ITN 264
// Section: 201
// Title: Assignment 10: Display Database Data
// Due: 11/8/2024

$title = 'Login Page';
include '../partials/header.php';
include '../partials/navBar.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Query to fetch the user by email or username
    $query = "SELECT id, password FROM users WHERE user_name = ? OR email = ?";
    $stmt = $db_conn->prepare($query);

    if (!$stmt) {
        die("Query preparation failed: " . $db_conn->error);
    }

    $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail); // Bind both username and email to the same parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: landing.php');
            exit();
        } else {
            $error_message = "Incorrect password.";
        }
    } else {
        $error_message = "User not found.";
    }

    $stmt->close();
}


// Display success message if set -->
// <?php if (isset($_SESSION['success_message'])): ?
//     <div class="alert alert-success text-center">
//         <?php
//         echo $_SESSION['success_message'];
//         unset($_SESSION['success_message']); // Clear the message
//         ?
//     </div>
// <?php endif; 
?>

<body class="global-body">

    <!-- Log in form -->
    <main class="content flex-grow-1">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post" action="#" class="p-4 border rounded shadow-sm bg-light">
                        <h2 class="text-center mb-4">Login</h2>
                        <div class="mb-3">
                            <label for="email" class="form-label">Username or Email:</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <div>
                            <h6 class="text-center mt-4"> New to Second Hand Herold? Sign-up <span> <a href="new_user.php">HERE</a></span></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <div>
        <?php include '../partials/footer.php'; ?>
    </div>
</body>

</html>