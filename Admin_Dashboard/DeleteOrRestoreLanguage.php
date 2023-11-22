<?php

include "../Connect.php";
$isActive = $_GET['isActive'];
$lang_id = $_GET['lang_id'];

$stmt = $con->prepare("UPDATE languages SET active = ? WHERE id = ? ");

$stmt->bind_param("ii", $isActive, $lang_id);

if ($stmt->execute()) {

    if ($isActive == 0) {

        echo "<script language='JavaScript'>
        alert ('Language Has Been Deleted Successfully !');
        </script>";

        echo "<script language='JavaScript'>
        document.location='./Languages.php';
        </script>";

    } else {
        echo "<script language='JavaScript'>
alert ('Language Has Been Restored Successfully !');
</script>";

        echo "<script language='JavaScript'>
document.location='./Languages.php';
</script>";
    }

}
