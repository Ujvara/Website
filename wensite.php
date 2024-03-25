<?php
session_start();

$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Website</title>
</head>
<body>
<div class="box1">
<div class="navbar">
    <img src="OIP.jpg" class="logo" width="170px" height="170px">
<ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="AboutUs.php">About Us</a></li>
    <li><a href="Workspace.php">Workspace</a></li>
    <li><a href="ContactUs.php">Contact Us</a></li>
    <?php if ($is_admin): ?>
            <li><a href="dashb.php">Dashboard</a></li>
        <?php endif; ?>
</ul>
</div>
<div class="text">
<h1>LET OUR BRAND SPEAK YOUR MESSAGE</h1>
<h3>Printing is an art form and our work is a reflection of our passion.</h3>
<p><i>We use <span class="span3">creativity</span> to create unique business <span class="span1">solutions</span> that connect our clients with their <span class="span2">audience</span></i></p>

</div>
</div>
</body>
</html>
