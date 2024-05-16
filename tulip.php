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
