<!DOCTYPE html>
  <html lang="en">

<?php
	//require_once("auth_check.php");
	
	//Start PHP session
	session_start();
	require_once '../database/mysqli_conn.php';
  require_once '../php/globalfunctions.php';
  generateHeader('Edit Item', ['../css/global.css', '../css/edit-table.css']);
  generateNavBar()
?> 


  <body>
    <div id="home">
      <div class="container">
	    <h2 style="color:red;">Products</h2>
        <table class="table">
          <thead class="thead-dark">
            <tr>
			  <th class="col-xs-1;"></th>
              <th class="col-xs-1; text-center">Product ID</th>				  
              <th class="col-xs-1; text-center">Item Name</th>				  
              <th class="col-xs-2">Price</th>
		      <th class="col-xs-1; text-center">City</th>
			  <th class="col-xs-1; text-center">State</th>
			  <th class="col-xs-1; text-center">Condition</th>	
              <th class="col-xs-4">Description</th>	  
            </tr>
          </thead>
          <tbody>
<?php			  

	$sql = "SELECT * FROM products ORDER BY item_name;";

	//echo("<br>" . $sql . "<br>");

	$result = mysqli_query($db_conn, $sql) or die(mysqli_error($db_conn));
    while($row = mysqli_fetch_assoc($result)) {

      echo("		    <tr>") . PHP_EOL;
	  
	  // ====================================================================
	  // The following HTML line adds the edit box to the table.  
	  // The edit box contains the link to edit the record.  <a href></a>
	  // The link is a GET request.
	  //
      echo('			  <td class="text-center">' . '<a href="product_edit.php?id=' . $row["id"] . '" class="btn btn-warning btn-sm">' . "Edit"  . '</a></td>') . PHP_EOL;
	  // ====================================================================
      
      echo('			  <td class="text-center">' . $row["id"]  . '</td>') . PHP_EOL;	  
      echo('			  <td>' .  $row["item_name"] . '</td>') . PHP_EOL;
      echo('			  <td>' . $row["price"] . '</td>') . PHP_EOL;
      echo('			  <td class="text-center">$ ' . $row["city"] . '</td>') . PHP_EOL;
      echo('			  <td class="text-center">$ ' . $row["state"] . '</td>') . PHP_EOL;
      echo('			  <td class="text-center">$ ' . $row["condition"] . '</td>') . PHP_EOL;
      echo('			  <td>' . substr($row["description"], 0, 45) . ' ...</td>') . PHP_EOL;
      echo("            </tr>") . PHP_EOL;
    }
?>
          </tbody>
       </table>
       <br>
       <br>
       <br>
       <br>
      </div>
    </div>
    <?php generateFooter(); ?>
  </body>
</html>