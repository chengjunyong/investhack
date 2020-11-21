<?php 
  include 'script/dbcon.php'; 
  $result = getUserDetail($conn);

  while($row = $result->fetch_array()){
      $name = (isset($row['name'])) ? $row['name'] : '';
      $role = (isset($row['role'])) ? $row['role'] : '';
      $gold = (isset($row['gold'])) ? $row['gold'] : '';
      $silver = (isset($row['silver'])) ? $row['silver'] : '';
      $image = (isset($row['image'])) ? $row['image'] : '';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>InvestHack</title>
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 
    <style>
    .img-xs {
        width: 40px;
        min-width: 40px;
        height: 40px;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?php echo $image;?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $name;?></p>
                  <p class="designation"><?php echo $role;?></p>
                </div>
              </a>
              <div style="margin-top: 15px;width:250px;color:white;font-size:15px;" class="row">
                <div class="col-6 silver-wallet" style="border-right: 1px solid white;text-align: center"> 
                  <img  src="assets/images/wallet_coin/silver-medal.png" width="16px" height="16px"><br/>
                   <p class="wallet-silver" style="display:inline-block;color:white;"><?php echo 'RM' . number_format($silver,2);?> </p>
                 
                </div>
                
                <div class="col-6 gold-wallet" style="text-align: center"> 
                  <img  src="assets/images/wallet_coin/gold-medal.png" width="16px" height="16px"><br/>
                   <p class="wallet-gold" style="display:inline-block;color:white;"><?php echo 'RM' . number_format($gold,2);?> </p>
                </div>
              </div>

            </li>

            <li class="nav-item">
              <a class="nav-link" href="stock_list.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Stock Markets</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="quiz-dashboard.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Quiz Challenge</span>
              </a>
            </li>

          </ul>
        </nav>

        

        <!-- partial -->
        <div class="main-panel">