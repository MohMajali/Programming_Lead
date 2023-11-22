<?php
session_start();

include "../Connect.php";

$A_ID = $_SESSION['A_Log'];
if (!$A_ID) {

    echo '<script language="JavaScript">
     document.location="../Adminlogin.php";
    </script>';

} else {

    $sql1 = mysqli_query($con, "select * from users where id='$A_ID'");
    $row1 = mysqli_fetch_array($sql1);

    $name = $row1['name'];
    $email = $row1['email'];

    if (isset($_POST['Submit'])) {

        $language_id = $_POST['language_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $link = $_POST['link'];

        $file = $_FILES["file"]["name"];
        $file = 'Artciles-images/' . $file;

        $stmt = $con->prepare("INSERT INTO languages_articles (language_id, title, description, image, link) VALUES (?, ?, ?, ?, ?) ");

        $stmt->bind_param("issss", $language_id, $title, $description, $file, $link);

        if ($stmt->execute()) {

            move_uploaded_file($_FILES["file"]["tmp_name"], "Artciles-images/" . $_FILES["file"]["name"]);

            echo "<script language='JavaScript'>
            alert ('A New Article Has Been Added Successfully !');
       </script>";

            echo "<script language='JavaScript'>
      document.location='./Articles.php';
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

    <title>Articles - Programming Lead</title>
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
        <h1>Articles</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item">Articles</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      <section class="section">
        <div class="mb-3">
          <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#verticalycentered"
          >
            Add New Article
          </button>
        </div>

        <div class="modal fade" id="verticalycentered" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Article Information</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">

                <form method="POST" action="./Articles.php" enctype="multipart/form-data">

                <div class="row mb-3">
                        <label for="defaultSelect" class="col-sm-4 col-form-label">Langauge</label>

                        <div class="col-sm-8">

                        <select id="defaultSelect" class="form-select" name="language_id" required>
                          <option disabled selected>Select Language</option>

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
                    <label for="inputText" class="col-sm-4 col-form-label"
                      >Article Title</label
                    >
                    <div class="col-sm-8">
                      <input type="text" name="title" class="form-control" required/>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label"
                      >Article Link</label
                    >
                    <div class="col-sm-8">
                      <input type="text" name="link" class="form-control" required />
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label"
                      >Description</label
                    >
                    <div class="col-sm-8">
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-4 col-form-label"
                      >Article Image</label
                    >
                    <div class="col-sm-8">
                      <input class="form-control" type="file" id="formFile" name="file" required/>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="text-end">
                      <button type="submit" name="Submit" class="btn btn-primary">
                        Submit Form
                      </button>
                    </div>
                  </div>
                </form>

              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Article Image</th>
                      <th scope="col">Language Name</th>
                      <th scope="col">Article Title</th>
                      <th scope="col">Article Link</th>
                      <th scope="col">created At</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
$sql1 = mysqli_query($con, "SELECT * from languages_articles ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {

    $article_id = $row1['id'];
    $language_id = $row1['language_id'];
    $title = $row1['title'];
    $image = $row1['image'];
    $link = $row1['link'];
    $active = $row1['active'];
    $created_at = $row1['created_at'];

    $sql2 = mysqli_query($con, "SELECT * from languages WHERE id = '$language_id' ORDER BY id DESC");
    $row2 = mysqli_fetch_array($sql2);

    $langName = $row2['name'];

    ?>
                    <tr>
                      <th scope="row"><?php echo $article_id ?></th>
                      <td><img src="<?php echo $image ?>" width="150px" height="150px" alt=""></td>
                      <td><?php echo $langName ?></td>
                      <td><?php echo $title ?></td>
                      <td><a target="_blank" href="<?php echo $link ?>"><?php echo $title ?> Link</a></td>
                      <td><?php echo $created_at ?></td>
                      <td>
                        <a href="./Edit-Article.php?article_id=<?php echo $article_id ?>&&language=<?php echo $langName ?>&&language_id=<?php echo $language_id ?>" class="btn btn-success"
                          >Edit</a
                        >

                        <?php if ($active == 1) {?>

<a href="./DeleteOrRestoreArticle.php?article_id=<?php echo $article_id ?>&&isActive=<?php echo 0 ?>" class="btn btn-danger">Delete</a>

<?php } else {?>

  <a href="./DeleteOrRestoreArticle.php?article_id=<?php echo $article_id ?>&&isActive=<?php echo 1 ?>" class="btn btn-primary">Restore</a>

<?php }?>
                      </td>
                    </tr>
<?php }?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
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
     document.querySelector('#sidebar-nav .nav-item:nth-child(5) .nav-link').classList.remove('collapsed')
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
