<?php
session_start();

require_once '../Connect.php';

$user_id = $_POST['user_id'];
$language_id = $_POST['language_id'];
$Rate = $_POST['rating'];

$sql5 = mysqli_query($con, "select * from languages_rates where language_id='$language_id' AND user_id='$user_id'");

if (mysqli_num_rows($sql5) > 0) {

    echo "<script language='JavaScript'>
			  alert ('Sorry .. You Already Rate This Seller Before !');
      </script>";

    echo "<script language='JavaScript'>
    document.location='./Language.php?lang_id=" . $language_id . "';
    </script>";

} else {

    $sql3 = mysqli_query($con, "select * from languages where id ='$language_id'");
    $row3 = mysqli_fetch_array($sql3);
    $Total_Rating = $row3['total_rate'];

    $New_Total_Rating = $Total_Rating + $Rate;

    mysqli_query($con, "insert into languages_rates (language_id,user_id,rate) values ('$language_id','$user_id','$Rate')");

    $sql3 = mysqli_query($con, "select * from languages_rates where language_id='$language_id'");
    $num3 = mysqli_num_rows($sql3);
    $TR = $New_Total_Rating / $num3;

    mysqli_query($con, "update languages set total_rate='$TR' where id ='$language_id'");

    echo "<script language='JavaScript'>
			  alert ('Thank You For Your Rate !');
      </script>";

    echo "<script language='JavaScript'>
    document.location='./Language.php?lang_id=" . $language_id . "';
    </script>";

}
