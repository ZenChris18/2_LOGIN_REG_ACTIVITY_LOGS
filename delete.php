<?php
include 'core/formhandler.php';

$id = $_GET['id'];
$result = handleDeleteRequest($id);

if ($result['statusCode'] === 200) {
    header('Location: index.php');
    exit();
} else {
    echo $result['message'];
}
?>
