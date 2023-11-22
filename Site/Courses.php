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

$sqlNormal = mysqli_query($con, "SELECT * from languages_courses WHERE active = 1 ORDER BY id DESC");

while ($rowNormal = mysqli_fetch_array($sqlNormal)) {

    $rows = array(
        'course_id' => $rowNormal['id'],
        'course_image' => $rowNormal['image'],
        'course_name' => $rowNormal['name'],
        'course_link' => $rowNormal['link'],
    );

    $response[] = $rows;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Courses</title>
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
            <a href="./Langauges.php" class="nav-item nav-link ">Languages</a>
            <a href="./Courses.php" class="nav-item nav-link active">Courses</a>
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
          <h5 class="fw-bold text-primary text-uppercase">Courses</h5>


        </div>
        <div class="row g-5">


          <?php

foreach ($response as &$row) {?>

<a id="<?php echo $course_id ?>" class="col-lg-4 wow slideInUp" data-wow-delay="0.3s" href="<?php echo $row['course_link'] ?>" target="_blank">

                <div class="team-item bg-light rounded overflow-hidden">
                <div class="team-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="../Admin_Dashboard/<?php echo $row['course_image'] ?>" alt="" />
                </div>
                  <div class="text-center py-4">
                    <h4 class="text-primary"><?php echo $row['course_name'] ?></h4>
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
