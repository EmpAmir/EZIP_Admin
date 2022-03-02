<?php session_start();
if (!isset($_SESSION["authentication_user"]) || $_SESSION["authentication_user"] !== true) {
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block text-capitalize"><?= $_SESSION['auth_user']['username']; ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-capitalize"><?= $_SESSION['auth_user']['username']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link active" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="tables-orders.php">
          <i class="bi bi-currency-dollar"></i>
          <span>All Buy USDT</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="tables-sales.php">
          <i class="fa fa-inr"></i>
          <span>All TRF INR</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>
  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <?php
      // Your message code
      if (isset($_SESSION['message'])) {
        echo '<h4 class="alert alert-warning">' . $_SESSION['message'] . '</h4>';
        unset($_SESSION['message']);
      } // Your message code
      ?>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <section class="section">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body p-0">
                      <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                              <Buy class="card-title p-0">Buy & Sale Today Details -- <span class="alert-warning text-dark"> <?php echo date("l jS \of F Y") ?></span>
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <div class="row">
                                <!-- Sales Card -->
                                <div class="col-md-3">
                                  <div class="card info-card sales-card">
                                    <div class="card-body">
                                      <h5 class="card-title">Buy USDT<span>| Today </span></h5>

                                      <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                          <?php
                                          include('include/dbConn.php');
                                          $user_id = $_SESSION['auth_user']['user_id'];
                                          $sql = "select sum(usdt_total) from orders where user_id ='$user_id' and  DATE(order_date) = CURDATE();";
                                          $q = mysqli_query($conn, $sql);
                                          $row = mysqli_fetch_array($q);
                                          ?>
                                          <h6><?php echo $row[0] ?></h6>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div><!-- End Sales Card -->

                                <!-- Revenue Card -->
                                <div class="col-md-3">
                                  <div class="card info-card revenue-card">
                                    <div class="card-body">
                                      <h5 class="card-title">Buy INR<span>| Today</span></h5>
                                      <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="fa fa-inr"></i>
                                        </div>
                                        <div class="ps-3">
                                          <?php
                                          $sql = "select sum(inr_total) from orders where user_id ='$user_id' and  DATE(order_date) = CURDATE();";
                                          $q = mysqli_query($conn, $sql);
                                          $buyInr = mysqli_fetch_array($q);
                                          ?>
                                          <h6><?php echo $buyInr[0] ?></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- End Revenue Card -->
                                <!-- Revenue Card -->
                                <div class="col-md-3">
                                  <div class="card info-card customers-card">
                                    <div class="card-body">
                                      <h5 class="card-title">Transfered INR<span>| Today</span></h5>
                                      <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="fa fa-inr"></i>
                                        </div>
                                        <div class="ps-3">
                                          <?php
                                          $sql = "select sum(inr_total) from sale where user_id ='$user_id' and  DATE(sale_date) = CURDATE();";
                                          $q = mysqli_query($conn, $sql);
                                          $trfInr = mysqli_fetch_array($q);
                                          ?>
                                          <h6><?php echo $trfInr[0] ?></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- End Revenue Card -->
                                <!-- Revenue Card -->
                                <div class="col-md-3">
                                  <div class="card info-card customers-card2">
                                    <div class="card-body">
                                      <h5 class="card-title">Rem. Bal. INR<span>| Today</span></h5>
                                      <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="fa fa-inr"></i>
                                        </div>
                                        <div class="ps-3">
                                          <?php
                                          $remBal = $buyInr[0] - $trfInr[0];
                                          ?>
                                          <h6><?php echo $remBal ?></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- End Revenue Card -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- total details till now -->
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              <Buy class="card-title p-0">
                                Buy & Sale Total Details</h5>
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <div class="row">
                                <!-- Sales Card -->
                                <div class="col-md-3">
                                  <div class="card info-card sales-card">
                                    <div class="card-body">
                                      <h5 class="card-title">Buy USDT<span>| Total </span></h5>

                                      <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                          <?php
                                          include('include/dbConn.php');
                                          $user_id = $_SESSION['auth_user']['user_id'];
                                          $sql = "select sum(usdt_total) from orders where user_id ='$user_id';";
                                          $q = mysqli_query($conn, $sql);
                                          $row = mysqli_fetch_array($q);
                                          ?>
                                          <h6><?php echo $row[0] ?></h6>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div><!-- End Sales Card -->

                                <!-- Revenue Card -->
                                <div class="col-md-3">
                                  <div class="card info-card revenue-card">
                                    <div class="card-body">
                                      <h5 class="card-title">Buy INR<span>| Total</span></h5>
                                      <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="fa fa-inr"></i>
                                        </div>
                                        <div class="ps-3">
                                          <?php
                                          $sql = "select sum(inr_total) from orders where user_id ='$user_id';";
                                          $q = mysqli_query($conn, $sql);
                                          $buyInr = mysqli_fetch_array($q);
                                          ?>
                                          <h6><?php echo $buyInr[0] ?></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- End Revenue Card -->
                                <!-- Revenue Card -->
                                <div class="col-md-3">
                                  <div class="card info-card customers-card">
                                    <div class="card-body">
                                      <h5 class="card-title">Transfered INR<span>| Total</span></h5>
                                      <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="fa fa-inr"></i>
                                        </div>
                                        <div class="ps-3">
                                          <?php
                                          $sql = "select sum(inr_total) from sale where user_id ='$user_id';";
                                          $q = mysqli_query($conn, $sql);
                                          $trfInr = mysqli_fetch_array($q);
                                          ?>
                                          <h6><?php echo $trfInr[0] ?></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- End Revenue Card -->
                                <!-- Revenue Card -->
                                <div class="col-md-3">
                                  <div class="card info-card customers-card2">
                                    <div class="card-body">
                                      <h5 class="card-title">Rem. Bal. INR<span>| Total</span></h5>
                                      <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="fa fa-inr"></i>
                                        </div>
                                        <div class="ps-3">
                                          <?php
                                          $remBal = $buyInr[0] - $trfInr[0];
                                          ?>
                                          <h6><?php echo $remBal ?></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div><!-- End Revenue Card -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <section class="section">
              <div class="row">
                <div class="col-md-7">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Buy USDT Details-<?php echo date("l jS \of F Y") ?></h5>
                      <div class="card mb-3 mt-3 pb-2">
                        <div class="pt-2 pb-2 ">
                          <h5 class="card-title text-center pb-0 fs-4">Create New Order</h5>
                        </div>

                        <form class="row g-3 needs-validation" action="" id="orderForm">
                          <div class="col-3">
                            <input type="hidden" name="id" id="id" class="form-control">
                            <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?= $_SESSION['auth_user']['user_id']; ?>">
                            <input type="text" name="usdt_rate" class="form-control" id="usdt_rate" placeholder="USDT Rate" required>

                            <div class="invalid-feedback">Please, enter usdt_rate!</div>
                          </div>
                          <div class="col-3">
                            <input type="text" name="usdt_total" class="form-control" id="usdt_total" placeholder="USDT Total" required>
                            <div class="invalid-feedback">Please enter usdt_total!</div>
                          </div>
                          <div class="col-3">
                            <input type="text" name="inr_total" class="form-control" id="inr_total" placeholder="INR Total" required>
                            <div class="invalid-feedback">Please enter inr_total !</div>
                          </div>


                          <div class="col-3">
                            <button class="btn btn-primary w-100" type="submit" id="btnOrder">New Order</button>
                          </div>

                        </form>
                      </div>
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">USDT_Rate</th>
                            <th scope="col">USDT_Total</th>
                            <th scope="col">INR_Total</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                      </table>
                      <!-- End Table with stripped rows -->

                    </div>
                  </div>

                </div>
                <div class="col-md-5">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">TRF INR Details-<?php echo date("l jS \of F Y") ?></h5>
                      <div class="card mb-3 mt-3 pb-2">
                        <div class="pt-2 pb-2 ">
                          <h5 class="card-title text-center pb-0 fs-4"> New TRF</h5>
                        </div>

                        <form class="row g-3 needs-validation" action="" id="saleForm">
                          <div class="col-4">
                            <input type="hidden" name="id" class="form-control" id="id">
                            <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?= $_SESSION['auth_user']['user_id']; ?>">
                            <input type="text" name="inr_stotal" class="form-control" id="inr_stotal" placeholder="INR Total" required>
                            <div class="invalid-feedback">Please enter inr_total !</div>
                          </div>
                          <div class="col-4">
                            <input type="text" name="utr" class="form-control" id="utr" placeholder="UTR NO." required>
                            <div class="invalid-feedback">Please enter TRF UTR NO!</div>
                          </div>
                          <div class="col-4">
                            <button class="btn btn-primary w-100" type="submit" id="btnSale">New TRF</button>
                          </div>

                        </form>
                      </div>
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">INR_Total</th>
                            <th scope="col">UTR</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="sbody">

                        </tbody>
                      </table>
                      <!-- End Table with stripped rows -->

                    </div>
                  </div>

                </div>
              </div>
            </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PWDEV</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jqajax.js"></script>
  <script src="js/jqajax_sale.js"></script>

  <script>
    // for multiply usdxrate	
    $('#usdt_rate, #usdt_total').on('input', function() {
      var usdt_rate = parseFloat($('#usdt_rate').val()) || 0;
      var usdt_total = parseFloat($('#usdt_total').val()) || 0;
      $('#inr_total').val(usdt_rate * usdt_total);
    });
  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>