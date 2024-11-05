
<?php

// Function to generate the header
function generateHeader($title, $stylesheets = [])
{
  echo '

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . htmlspecialchars($title) . '</title>

    <!-- Add the Bootstrap CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Add Font Awesome css file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer">';

  foreach ($stylesheets as $stylesheet) {
    echo '<link rel="stylesheet" href="' . htmlspecialchars($stylesheet) . '">';
  }
  echo '
  </head>';
}



function generateNavBar() {
    echo'
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <!--sets navbar color scheme (light colors) and size will expand or contrast automatically -->
        <a class="navbar-brand" href="landing.php">Secondhand Herold</a> <!--clicking the site name will go home-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> <!-- makes the navbar a hamburger when screen shrinks-->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="landing.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Browse Items</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sell.php">Sell an Item</a>
                </li>
            </ul>
        </div>
    </nav>
    ';
}



function generateFooter()
{
    echo '
        <!-- Footer -->
        <footer class="text-center mt-5 bg-dark text-white py-3">
            <p>&copy; 2024 Local Resale. All rights reserved.</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    ';
}
?>