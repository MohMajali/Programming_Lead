<?php

session_start();

include "../Connect.php";
$response = array();
$comments = [];

$sql3 = mysqli_query($con, "SELECT * from comments ORDER BY id DESC");

while ($row3 = mysqli_fetch_array($sql3)) {

    $comment_reader_id = $row3['commenter_id'];
    $post_id = $row3['post_id'];
    $comment = $row3['comment'];
    $comment_created_at = $row3['created_at'];

    $sql2 = mysqli_query($con, "SELECT * from users WHERE id = '$comment_reader_id' ORDER BY id DESC");
    $row2 = mysqli_fetch_array($sql2);

    $comment_reader_name = $row2['name'];
    $comment_reader_image = $row2['image'];

    $commentData = array(
        'comment_reader_id' => $comment_reader_id,
        'comment' => $comment,
        'created_at' => $comment_created_at,
        'reader_name' => $comment_reader_name,
        'reader_image' => $comment_reader_image,
        'post_id' => $post_id
    );

    $comments[] = $commentData;
}

$response['comments'] = $comments; 

echo json_encode($response);
