<!-- 
Name: Kyle Stranick
Course: ITN 264
Section: 201
Title: Assignment 10: Display Database Data
Due: 11/8/2024
-->

<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once '../database/mysqli_conn.php';
require_once '../php/globalfunctions.php';
generateHeader('Edit Item', ['../css/global.css', '../css/edit-table.css']);
generateNavBar();


function getSortOrder($column)
{
  $currentOrder = $_GET['order'] ?? 'ASC';
  $currentColumn = $_GET['column'] ?? 'id';

  // Toggle sort order if the same column is clicked
  return ($currentColumn === $column && $currentOrder === 'ASC') ? 'DESC' : 'ASC';
}

function getSortIcon($column)
{
  $currentColumn = $_GET['column'] ?? 'id';
  $currentOrder = $_GET['order'] ?? 'ASC';

  // Only show icon if the current column matches the sorted column
  if ($currentColumn === $column) {
    return $currentOrder === 'ASC' ? '▲' : '▼'; // Up for ASC, down for DESC
  }
  return ''; // No icon if column is not the current sorted column
}

// Define allowed columns to prevent SQL injection
$allowedColumns = ['id', 'item_name', 'price', 'city', 'state', 'condition'];
$column = $_GET['column'] ?? 'id';
$order = $_GET['order'] ?? 'ASC';

// Sanitize column input
if (!in_array($column, $allowedColumns)) {
  $column = 'id';
}

// Ensure order is ASC or DESC
$order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

// Update the SQL query with dynamic sorting
$sql = "SELECT * FROM products ORDER BY `$column` $order;";
$result = mysqli_query($db_conn, $sql) or die(mysqli_error($db_conn));
?>

<body class="global-body">
  <div class="hero-section text-center">
    <h1>Product Management</h1>
    <p class="lead">Manage and edit product listings with ease</p>
  </div>

  <div id="home" class="container my-5">
    <div class="table-container">
      <h2 class="text-center mb-4" style="color: #3582b6;">Products</h2>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th class="text-center">Edit</th>
            <th class="text-center sortable-header">
              <a href="?column=id&order=<?php echo getSortOrder('id'); ?>">Product ID <span class="sort-icon"><?php echo getSortIcon('id'); ?></span></a>
            </th>
            <th class="text-center sortable-header">
              <a href="?column=item_name&order=<?php echo getSortOrder('item_name'); ?>">Item Name <span class="sort-icon"><?php echo getSortIcon('item_name'); ?></span></a>
            </th>
            <th class="text-center sortable-header">
              <a href="?column=price&order=<?php echo getSortOrder('price'); ?>">Price <span class="sort-icon"><?php echo getSortIcon('price'); ?></span></a>
            </th>
            <th class="text-center sortable-header">
              <a href="?column=city&order=<?php echo getSortOrder('city'); ?>">City <span class="sort-icon"><?php echo getSortIcon('city'); ?></span></a>
            </th>
            <th class="text-center sortable-header">
              <a href="?column=state&order=<?php echo getSortOrder('state'); ?>">State <span class="sort-icon"><?php echo getSortIcon('state'); ?></span></a>
            </th>
            <th class="text-center sortable-header">
              <a href="?column=condition&order=<?php echo getSortOrder('condition'); ?>">Condition <span class="sort-icon"><?php echo getSortIcon('condition'); ?></span></a>
            </th>
            <th class="text-center">Description</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '  <td class="text-center"><a href="product_edit.php?id=' . $row["id"] . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a></td>';
            echo '  <td class="text-center">' . htmlspecialchars($row["id"]) . '</td>';
            echo '  <td class="text-center">' . htmlspecialchars($row["item_name"]) . '</td>';
            echo '  <td class="text-center">$' . htmlspecialchars($row["price"]) . '</td>';
            echo '  <td class="text-center">' . htmlspecialchars($row["city"]) . '</td>';
            echo '  <td class="text-center">' . strtoupper(htmlspecialchars($row["state"])) . '</td>';
            echo '  <td class="text-center">' . htmlspecialchars($row["condition"]) . '</td>';
            echo '  <td>' . htmlspecialchars(substr($row["description"], 0, 45)) . '...</td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php generateFooter(); ?>
</body>

</html>