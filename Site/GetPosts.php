<?php
session_start();

include "../Connect.php";
$response = array();
$posts = [];

$sql1 = mysqli_query($con, "SELECT * from posts ORDER BY id DESC");

while ($row1 = mysqli_fetch_array($sql1)) {

    $active = $row1['active'];
    if ($active == 1) {
        $post_id = $row1['id'];
        $reader_id = $row1['reader_id'];
        $title = $row1['title'];
        $description = $row1['description'];
        $image = $row1['image'];
        $created_at = $row1['created_at'];

        $sql2 = mysqli_query($con, "SELECT * from users WHERE id = '$reader_id' ORDER BY id DESC");
        $row2 = mysqli_fetch_array($sql2);

        $reader_name = $row2['name'];
        $reader_email = $row2['email'];
        $reader_image = $row2['image'];

        $postData = array(
            'id' => $post_id,
            'reader_name' => $reader_name,
            'reader_image' => $reader_image,
            'reader_email' => $reader_email,
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'created_at' => $created_at,
        );

        $posts[] = $postData;

    }

}

$response['posts'] = $posts; 

echo json_encode($response);
