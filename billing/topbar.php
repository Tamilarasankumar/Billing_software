<style>
  .logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
  }

  .no-underline {
    text-decoration: none;
    color: white;
  }

  .no-underline:hover {
    text-decoration: none;
    color: black;
    font-weight: bold;
  }
</style>

<nav class="navbar navbar-light fixed-top" style="padding:0; background-color: #343a40;">
  <div class="container-fluid mt-2 mb-2">
    <div class="col-lg-12">
      <!-- <div class="col-md-1 float-left" style="display: flex;">
  		</div> -->
      <div class="col-md-2 float-left text-white">
        <a href="..\index.php?page=home"><img src="..\assets\images\logo2.png" alt="" width="80px">
          <!-- <br> -->
          <span class="pt-5">
            <large><b>SONA Billing System
                <?php #echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' 
                ?>
                <!-- </b> -->
            </large>
          </span>
        </a>
      </div>
      <!-- <div class="col-md-1 float-left">
        <a href="..\billing/index.php" class="no-underline" style="">
          <div class="pt-2">
            <img src="assets\images\take_order1.png" alt="" height="50"><br>
            <large>take order</large>
          </div>
        </a>
      </div> -->
      <div class="col-md-1 float-left">
        <a href="../index.php" class="no-underline">
          <div class="pt-2 h6 text-center" style="color: #fadc1b;">
            <!-- <img src="assets\images\order list 3.png" alt="" height="50"><br> -->
            <large>Home</large>
          </div>
        </a>
      </div>
      <div class="col-md-1 float-left">
        <a href="..\index.php?page=orders" class="no-underline">
          <div class="pt-2 h6 text-center" style="color: #fadc1b;">
            <!-- <img src="assets\images\order list 3.png" alt="" height="50"><br> -->
            <large>Order List</large>
          </div>
        </a>
      </div>
      <?php if ($_SESSION['login_type'] == 1) : ?>
        <div class="col-md-1 float-left">
          <a href="..\index.php?page=categories" class="no-underline">
            <div class="pt-2 h6 text-center" style="color: #fadc1b;">
              <!-- <img src="assets\images\categories5.png" alt="" height="50"><br> -->
              <large>Categories</large>
            </div>
          </a>
        </div>
        <div class="col-md-1 float-left">
          <a href="..\index.php?page=products" class="no-underline">
            <div class="pt-2 h6 text-center" style="color: #fadc1b;">
              <!-- <img src="assets\images\product1.png" alt="" height="50"><br> -->
              <large>Product</large>
            </div>
          </a>
        </div>
      <?php endif; ?>
      <div class="col-md-1 float-left">
        <a href="..\index.php?page=sales_report" class="no-underline">
          <div class="pt-2 h6 text-center" style="color: #fadc1b;">
            <!-- <img src="assets\images\sales report.png" alt="" height="50"><br> -->
            <large>Sales Report</large>
          </div>
        </a>
      </div>
      <?php if ($_SESSION['login_type'] == 1) : ?>
        <div class="col-md-1 float-left">
          <a href="..\index.php?page=users" class="no-underline">
            <div class="pt-2 h6 text-center" style="color: #fadc1b;">
              <!-- <img src="assets\images\users1.png" alt="" height="50"><br> -->
              <large>Users</large>
            </div>
          </a>
        </div>
        <div class="col-md-1 float-left">
          <a href="..\index.php?page=site_settings" class="no-underline">
            <div class="pt-2 h6 text-center" style="color: #fadc1b;">
              <!-- <img src="assets\images\systems 2.png" alt="" height="50"><br> -->
              <large>System</large>
            </div>
          </a>
        </div>
      <?php endif; ?>
      <!-- <div class="col-md-1 float-left">
        <a class="no-underline" href="javascript:void(0)" id="manage_my_account">
          <div class="pt-2">
            <img src="assets\images\settings1.png" alt="" height="50"><br>
            <large><?php echo $_SESSION['login_name'] ?></large>
          </div>
        </a>
      </div> -->
      <div class="col-md-1 float-right">
        <a href="..\ajax.php?action=logout" class="no-underline">
          <div class="pt-2 h6 text-center" style="color: #eb463e;">
            <!-- <img src="assets\images\log out1.png" alt="" height="50"><br> -->
            <large>Logout</large>
          </div>
        </a>
      </div>
      <!-- <div class="float-right">
        <div class=" dropdown mr-4">
            <a href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="assets\images\settings.png" alt="" height="50"><br>
              <?php #echo $_SESSION['login_name'] 
              ?> </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
              </div>
        </div>
      </div> -->
    </div>
</nav>

<script>
  $('#manage_my_account').click(function() {
    uni_modal("Manage Account", "manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>

<!-- <style>
  .logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
  }
</style>

<nav class="navbar navbar-light fixed-top bg-secondary" style="padding:0">
  <div class="container-fluid mt-2 mb-2">
    <div class="col-lg-12">
      <div class="col-md-1 float-left" style="display: flex;">

      </div>
      <div class="col-md-4 float-left text-white">
        <large><b>SONA Billing System<?php #echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' 
                                      ?></b></large>
      </div>
      <div class="float-right">
        <div class=" dropdown mr-4">
          <a href="#" class="text-white dropdown-toggle" id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
          <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
            <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
            <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
          </div>
        </div>
      </div>
    </div>

</nav>

<script>
  $('#manage_my_account').click(function() {
    uni_modal("Manage Account", "manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script> -->