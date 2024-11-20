<!-- 
Name: Kyle Stranick
Course: ITN 264
Section: 201
Title: Assignment 10: Display Database Data
Due: 11/8/2024
-->


<?php
session_start();
$title = 'Sell an Item';
include '../partials/header.php';
include '../partials/navBar.php';
?>

<body class="global-body">
    <main class="content flex-grow-1">
        <?php include '../partials/sellForm.php'; ?>
    </main>
    <div>
        <?php include '../partials/footer.php'; ?>
    </div>
</body>

</html>