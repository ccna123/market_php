<?php
    $conn = mysqli_connect("localhost", "root", "", "crub_basic");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>