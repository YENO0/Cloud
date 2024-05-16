<?php 
define('DB_HOST', "yy-ver1-rds.ctqigw62kpxk.us-east-1.rds.amazonaws.com");
define('DB_USER', "yen0809");
define('DB_PASS', "p3TEr100");
define('DB_NAME', "PETER");

$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$message = array();

(isset($_GET['id']))?
            $id = strtoupper(trim($_GET['id'])):
                $id = "";

if(isset($_POST['add_to_cart']) || isset($_POST['buy_now'])){
    $product_size = $_POST['Size'];
    $product_quantity = $_POST['quantity'];
            
   if(empty($product_size) || empty($product_quantity)) {
    $message[]='Please fill in all the requirements';
} else {
    $insert = "INSERT INTO order (product_size, product_quantity, id) VALUES ('$product_size', '$product_quantity', '$id')";
    if(mysqli_query($con, $insert)) {
        $message[] = "Order added to cart successfully";
    } else {
        $message[] = "Error inserting data: " . mysqli_error($con);
    }
}
};
 $con->close();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewpoint" content="width=device-width,initial-scale=1.0">
        <title>Tulip</title>
        <link href="css/product.css" 
              rel="stylesheet" 
              type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
              integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
              crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <?php include './header1.php'; ?>
        
        <footer><?php
        include './footer1.php'
        ?></footer>
   </body>
</html>
