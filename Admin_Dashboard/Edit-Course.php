<?php
session_start();

include "../Connect.php";

$A_ID = $_SESSION['A_Log'];
$course_id = $_GET['course_id'];
$language = $_GET['language'];
$language_id = $_GET['language_id'];

if (!$A_ID) {

    echo '<script language="JavaScript">
     document.location="../Adminlogin.php";
    </script>';

} else {

    $sql1 = mysqli_query($con, "select * from users where id='$A_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];

    $sql2 = mysqli_query($con, "select * from languages_courses where id='$course_id'");
    $row2 = mysqli_fetch_array($sql2);

    $courseName = $row2['name'];
    $description = $row2['description'];
    $language_id = $row2['language_id'];
    $author = $row2['author'];
    $link = $row2['link'];
    $rate = $row2['rate'];

    if (isset($_POST['Submit'])) {

        $course_id = $_POST['course_id'];
        $language_id = $_POST['language_id'];
        $name = $_POST['name'];
        $author = $_POST['author'];
        $link = $_POST['link'];
        $rate = $_POST['rate'];
        $description = $_POST['description'];

        $stmt = $con->prepare("UPDATE languages_courses SET language_id = ?, name = ?, author = ?, link = ?, rate = ?, description = ? WHERE id = ? ");

        $stmt->bind_param("isssssi", $language_id, $name, $author, $link, $rate, $description, $course_id);

        if ($stmt->execute()) {

            echo "<script language='JavaScript'>
            alert ('Course Has Been Updated Successfully !');
       </script>";

            echo "<script language='JavaScript'>
      document.location='./Courses.php';
         </script>";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Course - Programming Lead</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/Logo.jpg" rel="icon" />
    <link href="assets/img/Logo.jpg" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/Logo.jpg" alt="" />

        </a>
      </div>
      <!-- End Logo -->
      <!-- End Search Bar -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown pe-3">
            <a
              class="nav-link nav-profile d-flex align-items-center pe-0"
              href="#"
              data-bs-toggle="dropdown"
            >
              <img
                src="https://www.computerhope.com/jargon/g/guest-user.png"
                alt="Profile"
                class="rounded-circle"
              />
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $name ?></span> </a
            >

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $name ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="./Logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
          </li>
          <!-- End Profile Nav -->
        </ul>
      </nav>
      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require './Aside-Nav/Aside.php'?>
    <!-- End Sidebar-->

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Course</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item">Course</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Horizontal Form -->
                <form method="POST" action="./Edit-Course.php?course_id=<?php echo $course_id ?>&&language=<?php echo $language ?>&&language_id=<?php echo $language_id?>" enctype="multipart/form-data">

                <input type="hidden" name="course_id" value="<?php echo $course_id ?>">

                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"
                      >Langauge Name</label
                    >
                    <div class="col-sm-10">
                    <select id="defaultSelect" class="form-select" name="language_id" required>
                          <option selected value="<?php echo $language_id ?>"><?php echo $language ?></option>

                          <?php

$sql1 = mysqli_query($con, "SELECT * from languages WHERE active = 1 ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {
    $langId = $row1['id'];
    $name = $row1['name'];

    ?>
                            <option value="<?php echo $langId ?>"><?php echo $name ?></option>



                          <?php }?>
                        </select>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"
                      >Course Name</label
                    >
                    <div class="col-sm-10">
                      <input type="text" name="name" value="<?php echo $courseName ?>" class="form-control" id="inputText" />
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"
                      >Course Author</label
                    >
                    <div class="col-sm-10">
                      <input type="text" name="author" value="<?php echo $author ?>" class="form-control" id="inputText" />
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"
                      >Course Link</label
                    >
                    <div class="col-sm-10">
                      <input type="text" name="link" value="<?php echo $link ?>" class="form-control" id="inputText" />
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"
                      >Course Rate</label
                    >
                    <div class="col-sm-10">
                      <input type="text" name="rate" value="<?php echo $rate ?>" class="form-control" id="inputText" />
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"
                      >Description</label
                    >
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?php echo $description ?></textarea>
                    </div>
                  </div>





                  <div class="text-end">
                    <button type="submit" name="Submit" class="btn btn-primary">
                      Submit
                    </button>
                    <button type="reset" class="btn btn-secondary">
                      Reset
                    </button>
                  </div>
                </form>
                <!-- End Horizontal Form -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>Programming Lead</span></strong
        >. All Rights Reserved
      </div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <script>
    window.addEventListener('DOMContentLoaded', (event) => {
     document.querySelector('#sidebar-nav .nav-item:nth-child(6) .nav-link').classList.remove('collapsed')
   });
</script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
