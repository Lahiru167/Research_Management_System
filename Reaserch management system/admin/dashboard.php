<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <h3>welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">update profile</a>
      </div>

      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `info`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><span>Information System</span></h3>
         <p><?= $number_of_products; ?></p>
         <a href="addReserch.php" class="btn"> add Research</a>
      </div>

   

      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `business`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><span>Business Management</span></h3>
         <p><?= $number_of_products; ?></p>
         <a href="addReserch1.php" class="btn">add resetrch</a>
      </div>

      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `tourism`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>
         <h3><span>Tourism Hospitality Management</span> </h3>
         <p><?= $number_of_users; ?></p>
         <a href="addReserch2.php" class="btn">add resetrch</a>
      </div>
       <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `accout`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>
         <h3><span>Accounting and Finance</span> </h3>
         <p><?= $number_of_users; ?></p>
         <a href="addReserch3.php" class="btn">add resetrch</a>
      </div>
      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `marketing`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>
         <h3><span>Marketing</span> </h3>
         <p><?= $number_of_users; ?></p>
         <a href="addReserch4.php" class="btn">add resetrch</a>
      </div>
      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `human`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>
         <h3><span>Human Resource Management</span> </h3>
         <p><?= $number_of_users; ?></p>
         <a href="addReserch5.php" class="btn">add resetrch</a>
      </div>

      <div class="box">
         <?php
            $select_admins = $conn->prepare("SELECT * FROM `event`");
            $select_admins->execute();
            $number_of_event = $select_admins->rowCount()
         ?>
         <h3><span>Events</span></h3>
         <p><?= $number_of_event; ?></p>
         <a href="event.php" class="btn">add Event</a>
      </div>
      <div class="box">
         <?php
            $select_admins = $conn->prepare("SELECT * FROM `admin`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
         ?>
         <h3><?= $number_of_admins; ?></h3>
         <p>admin users</p>
         <a href="admin_accounts.php" class="btn">see admins</a>
      </div>

      <div class="box">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
         ?>
         <h3><?= $number_of_messages; ?></h3>
         <p>new messages</p>
         <a href="messages.php" class="btn">see messages</a>
      </div>

   </div>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>