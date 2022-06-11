<?php
  session_start();
  require_once 'connect.php';

  // if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
  //   // Set the post variables so we easily identify them, also make sure they are integer
  //   $product_id = (int)$_POST['product_id'];
  //   $quantity = (int)$_POST['quantity'];
  //   // Prepare the SQL statement, we basically are checking if the product exists in our databaser
  //   $product_query = mysqli_query($connect, 'SELECT * FROM `bestsellers` WHERE `best_id` = '.$_POST['product_id']);
  //   // Fetch the product from the database and return the result as an Array
  //   $product = mysqli_fetch_assoc($product_query, MYSQLI_ASSOC);
  //   // Check if the product exists (array is not empty)
  //   if ($product && $quantity > 0) {
  //       // Product exists in database, now we can create/update the session variable for the cart
  //       if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
  //           if (array_key_exists($product_id, $_SESSION['cart'])) {
  //               // Product exists in cart so just update the quanity
  //               $_SESSION['cart'][$product_id] += $quantity;
  //           } else {
  //               // Product is not in cart so add it
  //               $_SESSION['cart'][$product_id] = $quantity;
  //           }
  //       } else {
  //           // There are no products in cart, this will add the first product to cart
  //           $_SESSION['cart'] = array($product_id => $quantity);
  //       }
  //   }
  //   // Prevent form resubmission...
  //   header('location: ../index.php?page=cart');
  //   exit;
  // }


  // $products_in_cart = $_SESSION['cart'];
  // if(isset($_SESSION['cart'])) {
  //   $_SESSION['cart'] = array();
  // } 
  // $products = array();
  // $subtotal = 0.00;
  // // If there are products in cart
  // if ($products_in_cart) {
  //     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  //     // There are products in the cart so we need to select those products from the database
  //     // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
  //     $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
  //     $array_query = mysqli_query($connect, "SELECT * FROM `bestsellers` WHERE `best_id` IN ('$array_to_question_marks')");
  //     // We only need the array keys, not the values, the keys are the id's of the products
  //     // Fetch the products from the database and return the result as an Array
  //     $products = mysqli_fetch_all($array_query, MYSQLI_ASSOC);
  //     // Calculate the subtotal
  //     // foreach ($products as $product) {
  //     //     $subtotal += (float)$product['best_price'] * (int)$products_in_cart[$product['best_id']];
  //     // }
  // }
  
  $action = $_POST['action'];
  if ($action == 'show') {
    if (!isset($_SESSION['cart'])) {
      echo 'Увас нет заказов';
      exit;
    }
    $cart = $_SESSION['cart'];
    if (count($cart) == 0) {
      echo 'У вас нет заказов';
      exit;
    }
  }
?>