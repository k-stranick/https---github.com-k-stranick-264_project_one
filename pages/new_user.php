<?php
require_once '../php/globalfunctions.php';
require_once '../database/mysqli_conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Insert user data into the database
    $stmt = $db_conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php"); // Redirect to login page
        exit();
    } else {
        echo "<div class='alert alert-danger text-center'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}
?>

<body class="global-body">
    <?php
    generateHeader('New User Registration', ['../css/global.css']);
    generateNavBar();
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Register</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="" class="p-4 border rounded shadow-sm bg-light">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    generateFooter();
    ?>
</body>

</html>