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

  .nev-bg-b {
    transition: all 0.5s linear;
    /* border: 2px solid #ff0000;
    background-color: green; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    /* padding: 10px; */
    /* Increase padding for bigger background area */
  }

  .nev-bg-b:hover {
    position: relative;
    padding-top: 10px;
    padding-bottom: 15px;
    margin-bottom: -50px;
    color: #fff;
    background: #1c1c1c;
    background: #252836;
    border-radius: 15px;
    font-size: 13px;
    /* box-shadow: 0px -200px 97px -27px rgba(255, 197, 5, 0.76); */
    /* Add yellow shadow */
  }
  .confirmation-dialog {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .confirmation-dialog h3 {
            margin-bottom: 15px;
        }

        .confirmation-dialog button {
            padding: 10px;
            margin-right: 10px;
            cursor: pointer;
        }

        /* Additional styles for the blurred overlay */
        .blurred-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
            z-index: 999; /* Make sure this is lower than the dialog box z-index */
            display: none;
            filter: blur(5px); /* Adjust the blur intensity as needed */
        }


  /* a {
    transition: all 0.5s linear;
    text-decoration: none;
    color: #eeff00;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
  }

  a:hover {
    margin: 0 10px 0 0;
    color: #fff;
    background: #1c1c1c;
    border-radius: 15px;
  } */
</style>

<nav class="navbar navbar-light fixed-top" style="padding:0; background-color: #343a40;">
  <div class="container-fluid mt-2 mb-2">
    <div class="col-lg-12">
      <!-- <div class="col-md-1 float-left" style="display: flex;">
  		</div> -->
      <div class="col-md-2 float-left text-white">
        <a href="index.php?page=home" style="display: flex; flex-direction: column;">
          <img src="assets\images\logo2.png" alt="" width="150px">
          <large><b>SONA Billing System<?php #echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' 
                                        ?></b></large>
        </a>
      </div>
      <div class="col-md-1 float-left">
        <a href="billing/index.php" class="no-underline">
          <div class="nev-bg-b"><img src="assets\images\take_order1.png" alt="" height="50">
            <large>take order</large>
          </div>
        </a>
      </div>
      <div class="col-md-1 float-left">
        <a href="index.php?page=orders" class="no-underline" style="">
          <div class="nev-bg-b"><img src="assets\images\order list 3.png" alt="" height="50">
            <large>order list</large>
          </div>
        </a>
      </div>
      <?php if ($_SESSION['login_type'] == 1) : ?>
        <div class="col-md-1 float-left">
          <a href="index.php?page=categories" class="no-underline" style="">
            <div class="nev-bg-b"><img src="assets\images\categories5.png" alt="" height="50">
              <large>categories</large>
            </div>
          </a>
        </div>
        <div class="col-md-1 float-left">
          <a href="index.php?page=products" class="no-underline" style="">
            <div class="nev-bg-b"><img src="assets\images\product1.png" alt="" height="50">
              <large>product</large>
            </div>
          </a>
        </div>
      <?php endif; ?>
      <div class="col-md-1 float-left">
        <a href="index.php?page=sales_report" class="no-underline" style="">
          <div class="nev-bg-b"><img src="assets\images\sales report.png" alt="" height="50">
            <large>sales report</large>
          </div>
        </a>
      </div>
      <?php #if ($_SESSION['login_type'] == 1) : 
      ?>
      <div class="col-md-1 float-left">
        <a href="index.php?page=users" class="no-underline" style="">
          <div class="nev-bg-b"><img src="assets\images\users1.png" alt="" height="50">
            <large>users</large>
          </div>
        </a>
      </div>
      <div class="col-md-1 float-left">
        <a href="index.php?page=site_settings" class="no-underline" style="">
          <div class="nev-bg-b"><img src="assets\images\systems 2.png" alt="" height="50">
            <large>System</large>
          </div>
        </a>
      </div>
      <?php #endif; 
      ?>
      <div class="col-md-1 float-left">
        <a class="no-underline" href="javascript:void(0)" id="manage_my_account">
          <div class="nev-bg-b"><img src="assets\images\settings1.png" alt="" height="50">
            <large><?php echo $_SESSION['login_name'] ?></large>
          </div>
        </a>
      </div>
      <div class="col-md-1 float-right">
                    <a href="javascript:void(0)" class="no-underline logout-button">
                        <div><img src="assets\images\log out1.png" alt="" height="50"><br>
                            <large>Logout</large>
                        </div>
                    </a>
                </div>
                <div class="blurred-overlay" id="blurredOverlay"></div>
                
                <!-- Logout confirmation dialog -->
                <div class="confirmation-dialog" id="logoutConfirmation">
                    <h3>Logout Confirmation</h3>
                    <p>Are you sure you want to logout?</p>
                    <button id="confirmLogout">Yes</button>
                    <button id="cancelLogout">No</button>
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

<!-- <script>
  $('#manage_my_account').click(function() {
    var userId = "<?php # echo $_SESSION['login_id']; 
                  ?>";
    uni_modal("Manage Account", "manage_user.php?id=" + userId + "&mtype=own");
  })
</script> -->
<script>
  $(document).ready(function() {
    // Function to show the confirmation dialog and blurred overlay
    function showConfirmationDialog() {
      $('#blurredOverlay').fadeIn();
      $('#logoutConfirmation').fadeIn();
    }

    // Function to hide the confirmation dialog and blurred overlay
    function hideConfirmationDialog() {
      $('#blurredOverlay').fadeOut();
      $('#logoutConfirmation').fadeOut();
    }

    // Function to clear todo list data from local storage
    function clearTodoList() {
      localStorage.removeItem('todoList');
    }

    // Click event for the logout button
    $('.logout-button').click(function() {
      showConfirmationDialog();
    });

    // Click event for confirm logout
    $('#confirmLogout').click(function() {
      clearTodoList(); // Clear todo list data
      window.location.href = "ajax.php?action=logout";
    });

    // Click event for cancel logout
    $('#cancelLogout').click(function() {
      hideConfirmationDialog();
    });

    // Manage Account click event
    $('#manage_my_account').click(function() {
      uni_modal("Manage Account", "manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own");
    });
  });
</script>
