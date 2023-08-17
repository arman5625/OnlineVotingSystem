<header class="main-header" style="background-color:#717A83 ">
  <nav class="navbar navbar-static-top" style="background-color:#717A83 ">
    <div class="container" style="background-color:#717A83 ">
      <div class="navbar-header" style="background-color:#717A83 ">
        <a href="#" class="navbar-brand" style="background-color:#717A83 ;color:black ; font-size: 22px; font-family:Times  "><b>ONLINE<b> VOTING</b> SYSTEM</a>
        <button type="button" class="navbar-toggle collapsed"style="background-color:#717A83 " data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['student'])){
              echo "
                <li><a href='index.php'>HOME</a></li>
                <li><a href='transaction.php'>TRANSACTION</a></li>
              ";
            } 
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu"  >
        <ul class="nav navbar-nav"  >
          <li class="user user-menu" >
            
             <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu  " style="color:black">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #717A83 ;color:white ; font-size: 17px; font-family:Times" >
            <img src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $voter['firstname'].' '.$voter['lastname']; ?></span>
          </a>
          <ul class="dropdown-menu" style="background-color: #4d5863 ;color:black ; font-size: 17px; font-family:Times">
            <!-- User image -->
            <li class="user-header" style="background-color:#4d5863 ;color:black ; font-size: 17px; font-family:Times">
              <img src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $voter['firstname'].' '.$voter['lastname']; ?>
                <small>Member since <?php echo date('M. Y', strtotime($voter['created_on'])); ?></small>
              </p>
            </li>
            <li class="user-footer" style="background-color: #90979e ;color:white ; font-size: 17px; font-family:Times" >
              <div class="pull-left " style="background-color: #90979e ;color:white ; font-size: 17px; font-family:Times">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-curve" style="background-color: #d2d5d8" id="admin_profile">Update</a>
              </div>
              <div class="pull-right" style="background-color:#90979e ;color:black ; font-size: 17px; font-family:Times">
                <a href="logout.php" class="btn btn-default btn-curve" style="background-color: #d2d5d8" >  Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
          </voter
          </li>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>