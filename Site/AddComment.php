<?php
session_start();

include "../Connect.php";

$commenter_id = $_POST['commenter_id'];
$post_id = $_POST['post_id'];
$comment = $_POST['comment'];

$response = array();

$stmt = $con->prepare("INSERT INTO comments (commenter_id, post_id, comment) VALUES (?, ?, ?) ");

$stmt->bind_param("iis", $commenter_id, $post_id, $comment);

if ($stmt->execute()) {

    $response['mesage'] = true;

} else {

    $response['mesage'] = false;
}

echo json_encode($response);
