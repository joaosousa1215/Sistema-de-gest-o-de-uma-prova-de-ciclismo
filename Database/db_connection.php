<?php
    $servername = "ave.dee.isep.ipp.pt";
    $username = "1201034";  // Your database username
    $password = "MWY2MzMxMDdiMWQ2";  // Your database password
    $dbname = "1201034";  // The database name
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>