<?php
require_once '../php/globalfunctions.php';
require_once '../database/mysqli_conn.php';
session_start();

$title = 'Login Page';
include '../partials/header.php';
include '../partials/navBar.php';
?>

<body class="global-body">

    <!-- Display success message if set -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success text-center">
            <?php
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']); // Clear the message
            ?>
        </div>
    <?php endif; ?>

    <!-- Log in form -->
    <main class="content flex-grow-1">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post" action="process_login.php" class="p-4 border rounded shadow-sm bg-light">
                        <h2 class="text-center mb-4">Login</h2>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
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