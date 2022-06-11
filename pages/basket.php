<?php
  session_start();
  require_once '../root/connect.php';
  
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

  if ($action == 'add') {
    $cart = $_SESSION['cart'];
    $id = $_POST['id'];
    $newProduct['idProduct'] = $id;
    $cart[count($cart)] = $newProduct;
    $_SESSION['cart'] = $cart;
  }

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>books.kg - Basket</title>
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>

    <!-- font awesome cdn link  -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- custom css file link  -->
  <style>
    <?php include_once '../css/style.css'?>
  </style>
</head>
<body onload="showMyCart()">
  
<?php require_once '../pages/assets/header.php'?>

    <div class="header-2" style="padding: 5px">
        <nav class="navbar">
            <div style="font-size: 25px; color: #fff;">Basket</div>
        </nav>
    </div>

</header>

<div class="basket">
  <div class="basket-wrapper" id="ic-check">
    <?php
    
      for ($i = 0; $i < count($cart); $i++) {
        $idProduct = $cart[$i]['idProduct'];
        $result = mysqli_query($connect, "SELECT * from `bestsellers` WHERE `best_id` = ".$cart[$i]['idProduct']);

        while ($row = mysqli_fetch_assoc($result)):
    ?>
          <div class="basket-content">
            <div class="baket-content-image"><img src="../<?php echo $row['best_image']?>" alt=""></div>
            <div class="basket-content-title"><p><?php echo $row['best_name']?></p></div>
            <div class="basket-content-price"><p><?php echo $row['best_price']?> KGS</p></div>
            <button type="button" onclick="delFromCart(<?php echo $row['best_id']?>)"><div class="basket-content-delete"><i class="fal fa-times"></i></div></button>
          </div>
        <?php endwhile;?>
      
        <div class="basket-content-text"><h2>Nothing yet</h2></div>

  </div>
</div>

<?php require_once 'assets/footer.php'?>

<!-- footer section ends -->

<!-- loader  -->

<!-- <div class="loader-container">
  <img src="image/loader-img.gif" alt="">
</div> -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script type="text/javascript" src="../js/jquery-3.6.0.js"></script>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>