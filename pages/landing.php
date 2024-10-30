<!-- 
Name: Kyle Stranick
Course: ITN 264
Section: 201
Title: Assignment Module 9: Database Connection
Date: 10/29/2024
-->


<!DOCTYPE html>
<html lang="en">

<?php
require_once '../php/globalfunctions.php';
generateHeader('Products', ['../css/global.css', '../css/landingpage.css']);
generateNavBar();
?>

<body class="global-body">


        <!-- main Section -->
        <div class="entry-section text-center">
            <div class="main-content">
                <h1>Find Great Deals in Your Neighborhood</h1>
                <p>Buy or sell locally, safely, and quickly!</p>
                <a href="products.php" class="btn btn-primary">Browse Items</a>
                <a href="sell.php" class="btn btn-secondary">Sell an Item</a>
            </div>
        </div>

        <!-- Features Section -->
        <div class="container features text-center">
            <div class="row">
                <div class="col-md-4">
                    <div class="icon mb-2">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>Easy to Use</h4>
                    <p>Find and sell items locally with ease.</p>
                </div>
                <div class="col-md-4">
                    <div class="icon mb-2">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Trusted Community</h4>
                    <p>Connect with verified local sellers and buyers.</p>
                </div>
                <div class="col-md-4">
                    <div class="icon mb-2">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h4>Great Deals</h4>
                    <p>Get the best prices on gently used items.</p>
                </div>
            </div>
        </div>

        <!-- Popular Categories Section -->
        <div class="container categories text-center">
            <h2>Explore Popular Categories</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="../media/electronics.jpg" class="card-img-top" alt="Electronics">
                        <div class="card-body">
                            <h5 class="card-title">Electronics</h5>
                            <a href="#" class="btn btn-outline-primary">Browse Electronics</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="../media/furniture.jpg" class="card-img-top" alt="Furniture">
                        <div class="card-body">
                            <h5 class="card-title">Furniture</h5>
                            <a href="#" class="btn btn-outline-primary">Browse Furniture</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="../media/istockphoto-480652712-612x612.jpg" class="card-img-top" alt="Vehicles">
                        <div class="card-body">
                            <h5 class="card-title">Vehicles</h5>
                            <a href="#" class="btn btn-outline-primary">Browse Vehicles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php generateFooter()?>
    </body>
</html>