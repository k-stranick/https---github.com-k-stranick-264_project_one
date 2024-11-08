<?php
session_start();
require_once '../database/mysqli_conn.php';
require_once '../php/globalfunctions.php';
generateHeader('Edit Item', ['../css/global.css', '../css/edit-form.css']);
generateNavBar();

$product_id = $_GET['id'] ?? null;
$error = false;
$message = "";

// Function to sanitize form inputs
function sanitize($data) {
    return htmlspecialchars(trim(stripslashes($data)));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $product_id = sanitize($_POST['id']);
    $item_name = sanitize($_POST['itemTitle']);
    $description = sanitize($_POST['description']);
    $price = sanitize($_POST['price']);
    $condition = sanitize($_POST['condition']);
    $city = sanitize($_POST['city']);
    $state = strtoupper(sanitize($_POST['state']));

    // Validate required fields
    if (empty($item_name) || empty($description) || empty($price) || empty($condition) || empty($city) || empty($state)) {
        $error = true;
        $message = "All fields are required.";
    }

    // If no errors, update the record
    if (!$error) {
        $sql = "UPDATE products SET 
                    item_name = ?, 
                    `description` = ?, 
                    price = ?, 
                    `condition` = ?, 
                    city = ?, 
                    `state` = ? 
                WHERE id = ?";

        $stmt = $db_conn->prepare($sql);
        $stmt->bind_param("ssdsssi", $item_name, $description, $price, $condition, $city, $state, $product_id);

        if ($stmt->execute()) {
            $message = "Product updated successfully.";
        } else {
            $message = "Error updating product: " . $stmt->error;
        }
        $stmt->close();
    }
} else {
    // Load product details for the given product_id
    if ($product_id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $db_conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $item_name = $row['item_name'];
            $description = $row['description'];
            $price = $row['price'];
            $condition = $row['condition'];
            $city = $row['city'];
            $state = $row['state'];
            // FIX $image_path = $row['image_path'];
        } else {
            header("Location: edit_items.php?message=Product not found.");
            exit();
        }
        $stmt->close();
    } else {
        header("Location: edit_items.php?message=Invalid product ID.");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<body class="global-body">
    <div class="container mt-5">
        <h2 class="text-center">Edit Item Details</h2>
        <?php if ($message): ?>
            <div class="alert <?php echo $error ? 'alert-danger' : 'alert-success'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-section">
                    <form method="post" action="product_edit.php?id=<?php echo $product_id; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $product_id; ?>">
                        <div class="mb-3">
                            <label for="itemTitle">Item Title</label>
                            <input type="text" class="form-control" id="itemTitle" name="itemTitle" value="<?php echo $item_name; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description">Item Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $description; ?></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" value="<?php echo $state; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="condition">Condition</label>
                            <input type="text" class="form-control" id="condition" name="condition" value="<?php echo $condition; ?>" required>
                        </div>
                        <!-- Need to rework the upload 
                        <div class="mb-3">
                            <label for="image">Upload New Images (optional):</label>
                            <input type="file" class="form-control" id="image" name="image[]" multiple>
                            <small>Current images: <?php echo htmlspecialchars($image_path); ?></small>
                        </div>
                        -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                            <a href="item_table.php" class="btn btn-secondary">Cancel</a>
                            <a href="item_table.php" class="btn btn-secondary">Return</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php generateFooter(); ?>
</body>

</html>
