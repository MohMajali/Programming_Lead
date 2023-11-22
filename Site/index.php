<?php
session_start();

include "../Connect.php";

$R_ID = $_SESSION['R_Log'];

if ($R_ID) {
    $sql1 = mysqli_query($con, "select * from users where id='$R_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Programming-Lead</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="./images/Logo_png.png" rel="icon" />

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

    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
      <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
          <h1 class="m-0">Programming-Lead</h1>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarCollapse"
        >
          <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto py-0">
            <a href="./index.php" class="nav-item nav-link active">Home</a>
            <a href="./About.php" class="nav-item nav-link">About</a>
            <a href="./Langauges.php" class="nav-item nav-link">Languages</a>
            <a href="./Courses.php" class="nav-item nav-link">Courses</a>
            <a href="./Posts.php" class="nav-item nav-link">Posts</a>
            <a href="./Contact.php" class="nav-item nav-link">Contact</a>


          <?php if (!$R_ID) {?>

            <a href="../Login.php" class="nav-item nav-link">Login</a>

              <?php } else {  ?>

                <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo $name ?></a>
                        <div class="dropdown-menu m-0">
                            <a href="./Profile.php" class="dropdown-item">Profile</a>
                            <a href="./Logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>

              <?php }   ?>
          </div>
        </div>
      </nav>


    </div>
    <!-- Navbar & Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-7">
            <div class="section-title position-relative pb-3 mb-5">
              <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
              <h1 class="mb-0">
                The Best IT Solution With 10 Years of Experience
              </h1>
            </div>
            <p class="mb-4">
              Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor
              sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem
              et sit, sed stet no labore lorem sit. Sanctus clita duo justo et
              tempor eirmod magna dolore erat amet
            </p>
            <div class="row g-0 mb-3">
              <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                <h5 class="mb-3">
                  <i class="fa fa-check text-primary me-3"></i>Award Winning
                </h5>
                <h5 class="mb-3">
                  <i class="fa fa-check text-primary me-3"></i>Professional
                  Staff
                </h5>
              </div>
              <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                <h5 class="mb-3">
                  <i class="fa fa-check text-primary me-3"></i>24/7 Support
                </h5>
                <h5 class="mb-3">
                  <i class="fa fa-check text-primary me-3"></i>Fair Prices
                </h5>
              </div>
            </div>
            <div
              class="d-flex align-items-center mb-4 wow fadeIn"
              data-wow-delay="0.6s"
            >
              <div
                class="bg-primary d-flex align-items-center justify-content-center rounded"
                style="width: 60px; height: 60px"
              >
                <i class="fa fa-phone-alt text-white"></i>
              </div>
              <div class="ps-4">
                <h5 class="mb-2">Call to ask any question</h5>
                <h4 class="text-primary mb-0">+012 345 6789</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-5" style="min-height: 500px">
            <div class="position-relative h-100">
              <img
                class="position-absolute w-100 h-100 rounded wow zoomIn"
                data-wow-delay="0.9s"
                src="img/about.jpg"
                style="object-fit: cover"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->



    <!-- Lanuguages Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5">
        <div
          class="section-title text-center position-relative pb-3 mb-5 mx-auto"
          style="max-width: 600px"
        >
          <h5 class="fw-bold text-primary text-uppercase">Langauges</h5>
          <h1 class="mb-0">XXXX XXXX XXXX XXXX XXXX XXXX</h1>
        </div>
        <div class="row g-5">


        <?php

$sql2 = mysqli_query($con, "SELECT * from languages WHERE active = 1 ORDER BY id DESC");

while ($row2 = mysqli_fetch_array($sql2)) {
    $langId = $row2['id'];
    $langName = $row2['name'];
    $langDescription = $row2['description'];
    $langImage = $row2['image'];
    $total_rate = $row2['total_rate'];

    ?>
          <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
            <div class="blog-item bg-light rounded overflow-hidden">
              <div class="blog-img position-relative overflow-hidden">
                <img class="" src="../Admin_Dashboard/<?php echo $langImage ?>" alt="" width="400px" height="280px"/>
                <a
                  class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"
                  href=""
                  ><?php echo $langName ?></a
                >
              </div>
              <div class="p-4">
                <div class="d-flex mb-3">


<?php

    for ($i = 0; $i < $total_rate; $i++) {
        echo '<span class="fa fa-star"></span>';
    }

    ?>

                </div>
                <a class="text-uppercase" href="./Language.php?language_id=<?php echo $langId ?>"
                  >Read More <i class="bi bi-arrow-right"></i
                ></a>
              </div>
            </div>
          </div>
          <?php }?>


        </div>
      </div>
    </div>
    <!-- Lanuguages End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5">
        <div
          class="section-title text-center position-relative pb-3 mb-4 mx-auto"
          style="max-width: 600px"
        >
          <h5 class="fw-bold text-primary text-uppercase">Articles</h5>
          <h1 class="mb-0">XXXX XXXX XXXX XXXX</h1>
        </div>
        <div
          class="owl-carousel testimonial-carousel wow fadeInUp"
          data-wow-delay="0.6s"
        >


        <?php

$sql1 = mysqli_query($con, "SELECT * from languages_articles WHERE active = 1 ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {
    $articleId = $row1['id'];
    $language_id = $row1['language_id'];
    $title = $row1['title'];
    $description = $row1['description'];
    $articleImage = $row1['image'];
    $articleLink = $row1['link'];

    $sql2 = mysqli_query($con, "SELECT * from languages WHERE id = '$language_id' AND active = 1");
    $row2 = mysqli_fetch_array($sql2);

    $lang_name = $row2['name'];

    ?>
          <a class="testimonial-item bg-light my-4" href="<?php echo $articleLink ?>" target="_blank">
            <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
              <img
                class="img-fluid rounded"
                src="../Admin_Dashboard/<?php echo $articleImage ?>"
                style="width: 60px; height: 60px"
              />
              <div class="ps-4">
                <h4 class="text-primary mb-1"><?php echo $title ?></h4>
                <small class="text-uppercase"><?php echo $lang_name ?></small>
              </div>
            </div>
            <div class="pt-4 pb-5 px-5">
              <?php echo $description ?>
            </div>
</a>

          <?php }?>

        </div>
      </div>
    </div>
    <!-- Testimonial End -->

    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5">
        <div
          class="section-title text-center position-relative pb-3 mb-5 mx-auto"
          style="max-width: 600px"
        >
          <h5 class="fw-bold text-primary text-uppercase">Courses</h5>
          <h1 class="mb-0">XXXX XXXX XXXX XXXX</h1>
        </div>
        <div class="row g-5">

        <?php

$sql3 = mysqli_query($con, "SELECT * from languages_courses WHERE active = 1 ORDER BY id DESC");

while ($row3 = mysqli_fetch_array($sql3)) {
    $courseId = $row3['id'];
    $language_id = $row3['language_id'];
    $courseName = $row3['name'];
    $courseDescription = $row3['description'];
    $courseImage = $row3['image'];
    $author = $row3['author'];
    $link = $row3['link'];
    $rate = $row3['rate'];

    $sql4 = mysqli_query($con, "SELECT * from languages WHERE active = 1 AND id = '$language_id'");
    $row4 = mysqli_fetch_array($sql4);

    $langName2 = $row4['name'];

    ?>
          <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
            <div class="blog-item bg-light rounded overflow-hidden">
              <div class="blog-img position-relative overflow-hidden">
                <img class="img-fluid" src="../Admin_Dashboard/<?php echo $courseImage ?>" alt="" width="400px" height="280px"/>
                <a
                  class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"
                  href=""
                  ><?php echo $langName2 ?></a
                >
              </div>
              <div class="p-4">
                <div class="d-flex mb-3">
                  <small class="me-3"
                    ><i class="far fa-user text-primary me-2"></i><?php echo $author ?></small
                  >
                </div>
                <h4 class="mb-3"><?php echo $courseName ?></h4>
                <p>
                <?php echo $courseDescription ?>
                </p>


                <a class="text-uppercase" href="<?php echo $link ?>" target="_blank"
                  >View Course <i class="bi bi-arrow-right"></i
                ></a>
              </div>
            </div>
          </div>

          <?php }?>
        </div>
      </div>
    </div>
    <!-- Team End -->

  <?php require './Footer.php'?>

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
