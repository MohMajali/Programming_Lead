<?php
session_start();

include "../Connect.php";

$R_ID = $_SESSION['R_Log'];
$lang_id = $_GET['lang_id'];

if ($R_ID) {
    $sql1 = mysqli_query($con, "select * from users where id='$R_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];
}

$sql2 = mysqli_query($con, "SELECT * FROM languages WHERE id ='$lang_id'");
$row2 = mysqli_fetch_array($sql2);

$langName = $row2['name'];
$description = $row2['description'];
$langImage = $row2['image'];
$started_date = $row2['started_date'];

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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/single-language.css" rel="stylesheet" />
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
            <a href="./index.php" class="nav-item nav-link ">Home</a>
            <a href="./About.php" class="nav-item nav-link">About</a>
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
        </div>
      </nav>


    </div>
    <!-- Navbar & Carousel End -->




    <section class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <img src="../Admin_Dashboard/<?php echo $langImage ?>" width="100%" id="mainImg" alt="">
                </div>
                <div class="col-lg-8">
        <h6>Home / Languages</h6>
            <h4><?php echo $langName ?></h4>
            <h2>Started Date : <?php echo $started_date ?></h2>
            <h4><?php echo $langName ?> Details</h4>
            <span><?php echo $description ?>.</span>
        </div>
                </div>

        </div>

        <?php if ($R_ID) {?>

          <div class="container">
            <form id="ratingForm" action="./Rate_language.php" method="post">
              <input id="userInput" type="hidden" name="user_id" value="<?php echo $R_ID ?>">
              <input id="langInput" type="hidden" name="language_id" value="<?php echo $lang_id ?>">

              <div class="rating">
                <span><input type="radio" name="rating" id="str1" value="1" onclick="submitForm()"><label class="fa fa-star" for="str1"></label></span>
                <span><input type="radio" name="rating" id="str2" value="2" onclick="submitForm()"><label class="fa fa-star" for="str2"></label></span>
                <span><input type="radio" name="rating" id="str3" value="3" onclick="submitForm()"><label class="fa fa-star" for="str3"></label></span>
                <span><input type="radio" name="rating" id="str4" value="4" onclick="submitForm()"><label class="fa fa-star" for="str4"></label></span>
                <span><input type="radio" name="rating" id="str5" value="5" onclick="submitForm()"><label class="fa fa-star" for="str5"></label></span>
              </div>
            </form>
          </div>

          <?php }?>
    </section>

    <section id="product1" class="section-p1">
        <h2><?php echo $langName ?> Articles</h2>
        <p>XXXX XXXX XXXX XXXX XXXX</p>
        <div class="pro-container">

        <?php

$sql3 = mysqli_query($con, "SELECT * from languages_articles WHERE active = 1 AND language_id = '$lang_id' ORDER BY id DESC");

while ($row3 = mysqli_fetch_array($sql3)) {
    $articleId = $row3['id'];
    $language_id = $row3['language_id'];
    $title = $row3['title'];
    $description = $row3['description'];
    $articleImage = $row3['image'];
    $articleLink = $row3['link'];

    ?>

            <div class="pro">
                <img src="../Admin_Dashboard/<?php echo $articleImage ?>" alt="">
                <div class="des mb-5">
                    <span><?php echo $title ?></span>
                    <h5><?php echo $description ?></h5>
                </div>
                <a href="<?php echo $articleLink ?>" target="_blank"><i class="fa fa-solid fa-link cart"></i></a>
            </div>
<?php }?>
        </div>
    </section>


    <section id="product1" class="section-p1">
        <h2><?php echo $langName ?> Courses</h2>
        <p>XXXX XXXX XXXX XXXX XXXX</p>
        <div class="pro-container">

        <?php

$sql4 = mysqli_query($con, "SELECT * from languages_courses WHERE active = 1 AND language_id = '$lang_id' ORDER BY id DESC");

while ($row4 = mysqli_fetch_array($sql4)) {
    $courseId = $row4['id'];
    $language_id = $row4['language_id'];
    $courseName = $row4['name'];
    $courseDescription = $row4['description'];
    $courseImage = $row4['image'];
    $author = $row4['author'];
    $link = $row4['link'];
    $rate = $row4['rate'];

    ?>

            <div class="pro">
                <img src="../Admin_Dashboard/<?php echo $courseImage ?>" alt="">
                <div class="des mb-5">
                    <span><?php echo $courseName ?></span>
                    <h5><?php echo $courseDescription ?></h5>
                </div>
                <a href="<?php echo $link ?>" target="_blank"><i class="fa fa-solid fa-link cart"></i></a>
            </div>
<?php }?>
        </div>
    </section>

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

    <script>

$(document).ready(function(){
    // Check Radio-box
    $(".rating input:radio").attr("checked", false);

    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });
});

function submitForm(){
        $('#ratingForm').submit()
    }

    </script>
</body>
</html>
