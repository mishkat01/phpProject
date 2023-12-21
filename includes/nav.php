<?php ob_start();?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real Estate Managemnt
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../dist/images/pic/favicon.ico">
    <link rel="stylesheet" href="../../dist/css/style.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-text navbar-dark p-3 gx-0" style="background-color: #123456;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CodeStar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Land
          </a>
          <ul class="dropdown-menu navli">
          <?php if($_SESSION['role']==1 || $_SESSION['role']==2){?>
            <li><a class="dropdown-item" href="../land/formland.php">Add New Land</a></li>
            <?php }?>
            <li><a class="dropdown-item" href="../land/ajxview.php">View All Land</a></li>
          </ul>
        </li>
        <?php if($_SESSION['role']==1){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Suplier
            </a>
            <ul class="dropdown-menu navli">
              <li><a class="dropdown-item" href="../suplier/formsuplier.php">Add A New Suplier</a></li>
              <li><a class="dropdown-item" href="../suplier/viewformsuplier.php">Suplier Details</a></li>
            </ul>
          </li>
        <?php }?>

        <?php if($_SESSION['role']==1){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Material
            </a>
            <ul class="dropdown-menu navli">
              <li><a class="dropdown-item" href="../metarial/formmetarial.php">Add Required Metarial</a></li>
              <li><a class="dropdown-item" href="../metarial/mview.php">View Metarial</a></li>
            </ul>
          </li>
        <?php }?>

        <?php if($_SESSION['role']==1){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Developer
            </a>
            <ul class="dropdown-menu navli">
              <li><a class="dropdown-item" href="../developer/devadd.php">New Developer</a></li>
              <li><a class="dropdown-item" href="../developer/dev.php">Developer Details</a></li>
              <li><a class="dropdown-item" href="../developer/view.php">Developer Base Aprtment</a></li>
            </ul>
          </li>
        <?php }?>

        <?php if($_SESSION['role']==1){?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Project
              </a>
              <ul class="dropdown-menu navli">
                <li><a class="dropdown-item" href="../project/formproject.php">New Project</a></li>
                <li><a class="dropdown-item" href="../project/pjview.php">Running Project</a></li>
              </ul>
            </li>
            <?php }?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Apartment
          </a>
          <ul class="dropdown-menu navli">
          <?php if($_SESSION['role']==1 || $_SESSION['role']==2){?>
            <li><a class="dropdown-item" href="../property/formproperty.php">Add New Aprtment</a></li>
            <li><a class="dropdown-item" href="../property/exitpro.php">Add Existing Aprtment</a></li>
            <li><a class="dropdown-item" href="../property/view.php">Agent Base Aprtment</a></li>
            <?php }?>
            <li><a class="dropdown-item" href="../property/propertyview.php">View All Aprtment</a></li>
            
          </ul>
        </li>
        <?php if($_SESSION['role']==1 || $_SESSION['role']==2){?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Customer
          </a>
          <ul class="dropdown-menu navli">
            <li><a class="dropdown-item" href="../customar/add_new_customar.php">New Client</a></li>
            <li><a class="dropdown-item" href="../customar/view_all_costomar.php">Client Detais</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <?php }?>
        <?php if($_SESSION['role']==1){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Agent
            </a>
            <ul class="dropdown-menu navli">
              <li><a class="dropdown-item" href="../agent/agentadd.php">Add An Agent</a></li>
              <li><a class="dropdown-item" href="../agent/agent.php">View Avaiable Agent</a></li>
            </ul>
          </li>
        <?php }?>
        <?php if($_SESSION['role']==1 || $_SESSION['role']==2){?>
        <li class="nav-item dropdown">
          
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Booking
          </a>
          <ul class="dropdown-menu navli">
          
            <!-- <li><a class="dropdown-item" href="../booking/formbooking.php">Book An Apartment</a></li> -->
            
            <li><a class="dropdown-item" href="../booking/bookingview.php">View Booking</a></li>
          </ul>
          <?php }?>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Installment
          </a>
          <ul class="dropdown-menu navli">
            <li><a class="dropdown-item" href="../instalment/formloan.php">Apply For Loan</a></li>
            <li><a class="dropdown-item" href="../instalment/loanview.php">Loan Details</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-regular fa-user fa-lg"></i>
          </a>
          <ul class="dropdown-menu navli pli">
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>