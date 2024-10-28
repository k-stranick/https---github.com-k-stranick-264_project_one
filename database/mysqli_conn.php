<?php

/*****
 *
 * This file contains the MySQL server configuration settings and makes the connection to
 * the database server.
 *
 *****/
 
	// These are all of the PHP constants that hold the information to allow 
	// the PHP application to login to the database server.

	
	// ** MySQL hostname **
	define( 'DB_HOST', 'localhost' );
  
	// ** MySQL database name **
	define( 'DB_NAME', 'database_name_here' );

	// ** MySQL database username **
	define( 'DB_USER', 'username_here' );

	// ** MySQL database password **
	define( 'DB_PASSWORD', 'password_here' );
	

	/* $db_conn is a database connection object.  It will be used with other functions
        so that we can communicate with the database server.  You could use any
        variable name for this. */
	
	 
	$db_conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// Check connection
	if ($db_conn -> connect_errno) {
		die("Failed to connect to MySQL server: " . $db_conn -> connect_error);
	}
    echo "Connected successfully";
?> 