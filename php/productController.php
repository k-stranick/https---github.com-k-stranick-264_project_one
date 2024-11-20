<?php
require_once '../database/mysqli_conn.php';

class ProductController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }


    // Fetch all products with optional sorting
    public function fetchProducts($column = 'id', $order = 'ASC')
    {
        $allowedColumns = ['id', 'item_name', 'price', 'city', 'state', 'condition'];
        $column = in_array($column, $allowedColumns) ? $column : 'id';
        $order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

        $query = "SELECT * FROM products ORDER BY `$column` $order";
        $result = $this->db->query($query);

        if (!$result) {
            die("Error fetching products: " . $this->db->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    // Fetch a single product by its ID
    public function fetchProductById($id)
    {
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            die("Statement preparation failed: " . $this->db->error);
        }


        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            $stmt->close();
            die("Error fetching product: " . $this->db->error);
        }
        $product = $result->fetch_assoc();
        $stmt->close();
        return $product;
    }

    public function addProducts($itemName, $itemPrice, $city, $state, $condition, $itemDescription, $imagePaths)
    {
        // Step 1: Prepare the INSERT query with placeholders for values
        $query = "INSERT INTO products (item_name, price, city, `state`, `condition`, `description`, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            return "Statement preparation failed: " . $this->db->error;
        }

        // Step 2: Bind parameters to the placeholders with appropriate data types
        // Here, 'sdssss' specifies the data types in order
        $stmt->bind_param("sdsssss", $itemName, $itemPrice, $city, $state, $condition, $itemDescription, $imagePaths);

        if (!$stmt->execute()) {
            $stmt->close(); // Close the statement on failure
            return "Error adding product: " . $stmt->error;
        }

        $stmt->close(); // Close the statement on success
        return "Product added successfully.";
    }

    // Delete a product by its ID
    public function deleteProduct($id)
    {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            return "Statement preparation failed: " . $this->db->error;
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            $stmt->close();
            return "Error deleting product: " . $stmt->error;
        }

        $stmt->close();
        return "Product deleted successfully.";
    }

    // Update a product
    public function updateProduct($product_id, $item_name, $description, $price, $condition, $city, $state)
    {
        $query = "UPDATE products SET 
                item_name = ?, 
                `description` = ?, 
                price = ?, 
                `condition` = ?, 
                city = ?, 
                `state` = ? 
              WHERE id = ?";
        $stmt = $this->db->prepare($query);

        if (!$stmt) {
            return "Statement preparation failed: " . $this->db->error;
        }

        $stmt->bind_param("ssdsssi", $item_name, $description, $price, $condition, $city, $state, $product_id);

        if (!$stmt->execute()) {
            $stmt->close();
            return "Error updating product: " . $stmt->error;
        }
        $stmt->close();
        return "Product updated successfully.";
    }

    // Get sorting order for headers
    public function getSortOrder($currentColumn, $column, $order)
    {
        return ($currentColumn === $column && $order === 'ASC') ? 'DESC' : 'ASC';
    }

    // Get sorting icon for headers
    public function getSortIcon($currentColumn, $column, $order)
    {
        if ($currentColumn === $column) {
            return $order === 'ASC' ? '▲' : '▼';
        }
        return '';
    }
}
