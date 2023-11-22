<?php

include "../Connect.php";
$isActive = $_GET['isActive'];
$article_id = $_GET['article_id'];

$stmt = $con->prepare("UPDATE languages_articles SET active = ? WHERE id = ? ");

$stmt->bind_param("ii", $isActive, $article_id);

if ($stmt->execute()) {

    if ($isActive == 0) {

        echo "<script language='JavaScript'>
        alert ('Article Has Been Deleted Successfully !');
        </script>";

        echo "<script language='JavaScript'>
        document.location='./Articles.php';
        </script>";

    } else {
        echo "<script language='JavaScript'>
alert ('Article Has Been Restored Successfully !');
</script>";

        echo "<script language='JavaScript'>
document.location='./Articles.php';
</script>";
    }

}
