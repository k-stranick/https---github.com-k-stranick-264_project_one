<!-- products -->

<?php
// Name: Kyle Stranick
// Course: ITN 264
// Section: 201
// Title: Assignment 10: Display Database Data
// Due: 11/8/2024

require_once '../php/productController.php'; // Database connection and controller
require_once '../php/productCard.php'; // Renders individual product cards

// Initialize ProductController
$productController = new ProductController($db_conn);

// Query to fetch products from the database
$products = $productController->fetchProducts();
$title = "Products";
$stylesheets = ['../css/products.css'];
include '../partials/header.php';
include '../partials/navbar.php';
?>

<body class="global-body">
    <main class="content flex-grow-1">

        <!-- Displays Products from database -->
        <div class="container mt-5">
            <h1 class="text-center mb-4">Browse What Everyone Has To Offer!</h1>
            <div class="row">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <?php renderProductCard($product); ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">No products available at this time.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Submission Form Section -->
        <div>
            <?php include '../partials/sellForm.php'; ?>
        </div>
    </main>
    <!-- Footer Section -->
    <div>
        <?php include '../partials/footer.php' ?>
    </div>
</body>

</html>