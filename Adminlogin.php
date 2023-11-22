<?php
session_start();

include "./Connect.php";

if (isset($_POST['Submit'])) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $query = mysqli_query($con, "SELECT * FROM users WHERE email ='$Email' AND password = '$Password' AND active = 1");

    if (mysqli_num_rows($query) > 0) {

        $row = mysqli_fetch_array($query);

        $A_ID = $row['id'];
        $_SESSION['A_Log'] = $A_ID;

        echo '<script language="JavaScript">
    document.location="Admin_Dashboard/";
    </script>';

    } else {

        echo '<script language="JavaScript">
	  alert ("Error ... Please Check Email Or Password !")
      </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="shortcut icon" type="image/png" href="./assets/img/Logo_png.png" />
      <link rel=icon href="./assets/img/Logo_png.png" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"
    />
    <link rel="stylesheet" href="./assets/css/login.css" />
    <title>Programming Lead | Admin Login</title>
  </head>
  <body>
    <div class="login_logo">
      <div class="login_logo-line"></div>
      <img src="./assets/img/Logo.jpg" alt="logo" />
    </div>

    <div class="login_logo">
      <div class="login_logo-line"></div>
      <p style="color: white; font-size: 50px">Programming Lead</p>
    </div>

    <div class="container white z-depth-2">
      <ul class="tabs teal">
        <li class="tab col s3">
          <a class="white-text active" href="#login">login</a>
        </li>
      </ul>
      <div id="login" class="col s12">
        <form class="col s12" method="POST" action="./Adminlogin.php">
          <div class="form-container">
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" name="email" class="validate" />
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate" />
                <label for="password">Password</label>
              </div>
            </div>
            <br />
            <center>
              <button
                class="btn waves-effect waves-light teal"
                type="submit"
                name="Submit"
              >
                Continue
              </button>
              <br />
              <br />
            </center>
          </div>
        </form>
      </div>
    </div>
    <svg
      class="bg-svg"
      xmlns="http://www.w3.org/2000/svg"
      version="1.1"
      xmlns:xlink="http://www.w3.org/1999/xlink"
      xmlns:svgjs="http://svgjs.com/svgjs"
      width="1640"
      height="760"
      preserveAspectRatio="none"
      viewBox="0 0 1640 760"
    >
      <g mask='url("#SvgjsMask1022")' fill="none">
        <rect
          width="1640"
          height="760"
          x="0"
          y="0"
          fill="rgba(3, 24, 55, 1)"
        ></rect>
        <path
          d="M709.5 462.24 a188.74 188.74 0 1 0 377.48 0 a188.74 188.74 0 1 0 -377.48 0z"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float2"
        ></path>
        <path
          d="M652.28,707.968C677.634,708.245,701.188,695.882,714.894,674.55C729.887,651.215,735.454,622.325,723.334,597.377C709.615,569.136,683.67,546.329,652.28,545.66C619.912,544.97,589.616,564.963,575.78,594.233C563.471,620.274,575.912,649.308,591.988,673.209C605.864,693.839,627.418,707.697,652.28,707.968"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float3"
        ></path>
        <path
          d="M-35.98 325.31 a127.08 127.08 0 1 0 254.16 0 a127.08 127.08 0 1 0 -254.16 0z"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float3"
        ></path>
        <path
          d="M390.89 514.79 a210.14 210.14 0 1 0 420.28 0 a210.14 210.14 0 1 0 -420.28 0z"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float3"
        ></path>
        <path
          d="M860.84 727.51 a194.93 194.93 0 1 0 389.86 0 a194.93 194.93 0 1 0 -389.86 0z"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float2"
        ></path>
        <path
          d="M1357.54 59.12 a243.95 243.95 0 1 0 487.9 0 a243.95 243.95 0 1 0 -487.9 0z"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float3"
        ></path>
        <path
          d="M962.608,463.594C1011.747,459.821,1051.067,427.907,1076.423,385.646C1102.706,341.839,1117.706,289.3,1094.482,243.797C1069.334,194.525,1017.885,164.799,962.608,162.652C903.2,160.345,842.733,182.097,811.71,232.814C779.458,285.541,780.048,354.075,813.873,405.807C845.07,453.52,905.768,467.959,962.608,463.594"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float1"
        ></path>
        <path
          d="M1030.5 370.97 a241.38 241.38 0 1 0 482.76 0 a241.38 241.38 0 1 0 -482.76 0z"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float1"
        ></path>
        <path
          d="M264.21 111.15 a158.71 158.71 0 1 0 317.42 0 a158.71 158.71 0 1 0 -317.42 0z"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float3"
        ></path>
        <path
          d="M10.02 671.93 a143.65 143.65 0 1 0 287.3 0 a143.65 143.65 0 1 0 -287.3 0z"
          fill="rgba(28, 83, 142, 0.4)"
          class="triangle-float3"
        ></path>
      </g>
    </svg>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  </body>
</html>
