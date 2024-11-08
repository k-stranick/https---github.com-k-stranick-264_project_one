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
require_once '../database/mysqli_conn.php'; // Ensure this file includes your DB connection

// Query to fetch products from the database
$query = "SELECT * FROM products";
$result = $db_conn->query($query);

generateHeader('Products', ['../css/global.css', '../css/products.css']);
generateNavBar();
?>

<body class="global-body">

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Browse What Everyone Has To Offer!</h1>
        <div class="row">
            <?php
            // Check if there are products in the database
            if ($result->num_rows > 0) {
                // Fetch each product and display it in a Bootstrap card
                while ($row = $result->fetch_assoc()) {
                    $imagePaths = explode(",", $row['image_path']); // Split the images

                    echo '
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div id="carousel' . $row['id'] . '" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                    ';

                    $isActive = true;
                    foreach ($imagePaths as $imagePath) {
                        $activeClass = $isActive ? ' active' : '';
                        echo '
                                <div class="carousel-item' . $activeClass . '">
                                    <img src="' . trim($imagePath) . '" class="d-block w-100" alt="Product Image">
                                </div>
                        ';
                        $isActive = false;
                    }

                    echo '      </div> <!-- End of carousel-inner -->

                                <!-- Carousel controls -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel' . $row['id'] . '" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel' . $row['id'] . '" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                            </div> <!-- End of carousel slide -->
                            
                            <!-- Card body -->
                            <div class="card-body text-start d-flex flex-column justify-content-between">
                                <h5 class="card-title">' . htmlspecialchars($row['item_name']) . '</h5>
                                <p class="card-text"><strong>Location:</strong> ' . htmlspecialchars($row['city']) . ', ' . strtoupper(htmlspecialchars($row['state'])) . '</p>
                                <p class="card-text"><strong>Price:</strong> $' . htmlspecialchars($row['price']) . '</p>
                                <p class="card-text"><strong>Condition:</strong> ' . htmlspecialchars($row['condition']) . '</p>
                                <p class="card-text"><strong>Description:</strong><br> ' . nl2br(htmlspecialchars($row['description'])) . '</p>
                                <a href="#" class="btn btn-primary">View More Details</a>
                            </div>
                        </div> <!-- End of card -->
                    </div> <!-- End of col-md-4 -->
                    ';
                }
            } else {
                echo '<p class="text-center">No products available at this time.</p>';
            }

            // Close the database connection
            $db_conn->close();
            ?>
        </div>

        <!-- Item Submission Form -->
        <div class="container mt-5">
            <h2 class="text-center">Want to Sell An Item? Add It Here!</h2>
            <div class="row justify-content-center">
                <div class="col-md-6"> <!-- Form is now limited to 6 out of 12 columns on medium or larger screens -->
                    <div class="form-section">
                        <form action="../php/submit_item.php" method="post" enctype="multipart/form-data">
                            <!-- Should add PHP at some point -->
                            <div class="mb-3">
                                <label for="itemTitle">Item Title</label>
                                <input type="text" class="form-control" id="itemTitle" name="itemTitle" placeholder="Enter item title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description">Item Description</label>
                                <textarea class="form-control" id="itemDescription" name="itemDescription" rows="3" placeholder="Enter item description" required></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter state" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="state">Condition</label>
                                    <input type="text" class="form-control" id="condition" name="condition" placeholder="Enter Condition" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image">Upload Item Image</label>
                                <input type="file" class="form-control" id="image" name="image[]" multiple required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit Item</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php generateFooter(); ?>
</body>

</html>
