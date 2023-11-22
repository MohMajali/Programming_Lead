<?php
session_start();

include "../Connect.php";

$R_ID = $_SESSION['R_Log'];

if ($R_ID) {
    $sql1 = mysqli_query($con, "select * from users where id ='$R_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];
}

$response = array();

if (isset($_POST['filter'])) {

    $rate = $_POST['rate'];
    $order_by = $_POST['order_by'];

    if ($rate) {

        $rateSql = mysqli_query($con, "SELECT * FROM languages WHERE total_rate >= '$rate' AND active = 1");

        while ($rateBy = mysqli_fetch_array($rateSql)) {

            $rows = array(
                'lang_id' => $rateBy['id'],
                'lang_image' => $rateBy['image'],
                'lang_name' => $rateBy['name'],
            );

            $response[] = $rows;

        }

    } else if ($order_by) {

        if ($order_by == 'ASC') {

            $sql2 = mysqli_query($con, "SELECT * FROM languages WHERE active = 1 ORDER BY started_date ASC");
        } else {
            $sql2 = mysqli_query($con, "SELECT * FROM languages WHERE active = 1 ORDER BY started_date DESC");

        }

        while ($orderBy = mysqli_fetch_array($sql2)) {

            $rows = array(
                'lang_id' => $orderBy['id'],
                'lang_image' => $orderBy['image'],
                'lang_name' => $orderBy['name'],
            );

            $response[] = $rows;

        }
    }
} else {
    $sqlNormal = mysqli_query($con, "SELECT * from languages WHERE active = 1 ORDER BY id DESC");

    while ($rowNormal = mysqli_fetch_array($sqlNormal)) {

        $rows = array(
            'lang_id' => $rowNormal['id'],
            'lang_image' => $rowNormal['image'],
            'lang_name' => $rowNormal['name'],
        );

        $response[] = $rows;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Languages</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="./images/Logo_png.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/animate/animate.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div class="spinner"></div>
    </div>
    <!-- Spinner End -->



    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <img src="./images/Logo_png.png" width="100px" height="100px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="navbar-nav ms-auto py-0">
            <a href="./index.php" class="nav-item nav-link ">Home</a>
            <a href="./About.php" class="nav-item nav-link ">About</a>
            <a href="./Langauges.php" class="nav-item nav-link active">Languages</a>
            <a href="./Courses.php" class="nav-item nav-link">Courses</a>
            <a href="./Posts.php" class="nav-item nav-link">Posts</a>
            <a href="./Contact.php" class="nav-item nav-link">Contact</a>


          <?php if (!$R_ID) {?>

            <a href="../Login.php" class="nav-item nav-link">Login</a>

              <?php } else {?>

                <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $name ?></a>
                        <div class="dropdown-menu m-0">
                            <a href="./Profile.php" class="dropdown-item">Profile</a>
                            <a href="./Logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>

              <?php }?>
          </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Students Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">

      <div class="container py-5">
        <div
          class="section-title text-center position-relative pb-3 mb-5 mx-auto"
          style="max-width: 600px"
        >
          <h5 class="fw-bold text-primary text-uppercase">Langauges</h5>


                      <div class="">
                        <form action="./Langauges.php" method="POST" class="row g-3">


                        <div class="col-md-4">
                      <select class="form-select" aria-label="Default select example" name="order_by">
                        <option disabled selected>Sort By</option>
                        <option value="ASC">Older to Newer</option>
                        <option value="DESC">Newer to Older</option>
                    </select>
                          </div>

                    <div class="col-md-6">
                      <select class="form-select" aria-label="Default select example" name="rate">
                        <option disabled selected>Select By Rating</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                    </select>
                          </div>


                          <!-- <div class="row mb-3"> -->
                    <div class="text-center col-md-2">
                      <button type="submit" name="filter" class="btn btn-primary">
                        Filter
                      </button>
                    </div>
                  <!-- </div> -->

                        </form>
                      </div>


        </div>
        <div class="row g-5">


          <?php

foreach ($response as &$row) {?>

<a class="col-lg-4 wow slideInUp" data-wow-delay="0.3s" href="./Language.php?lang_id=<?php echo $row['lang_id'] ?>">

                <div class="team-item bg-light rounded overflow-hidden">
                <div class="team-img position-relative overflow-hidden">
                    <img class="" src="../Admin_Dashboard/<?php echo $row['lang_image'] ?>" alt="" width="400px" height="280px"/>
                </div>
                  <div class="text-center py-4">
                    <h4 class="text-primary"><?php echo $row['lang_name'] ?></h4>
                  </div>
                </div>

            </a>
       <?php }?>



        </div>
      </div>
    </div>
    <!-- Students End -->

    <!-- Footer Start -->
    <?php require './Footer.php'?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
