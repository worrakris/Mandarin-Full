<?php

if (isset($_POST['email'])) {
    $email = strip_tags($_POST['email']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sqlStatement = "INSERT INTO tbl_subscription(email) VALUES ('{$email}')";
        
        $mysqli = new mysqli('localhost', 'mandari1_arm', 'arm12345', 'mandari1_project');
        $mysqli->query($sqlStatement);
        
        echo "<span class=\"label label-info\" >Thank you for your subscription.</span>";
    } else {
        echo "error";
    }
}
