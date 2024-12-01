<?php
include 'core/formhandler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = handleCreateForm($_POST);

    if ($result['statusCode'] === 200) {
        header('Location: index.php'); 
        exit();
    } else {
        echo $result['message'];
    }
}

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Applicant</title>
</head>
<body>
    <h1>Create New Applicant</h1>
    <form method="POST" action="create.php">
        <input type="text" name="firstName" placeholder="First Name" required>
        <input type="text" name="lastName" placeholder="Last Name" required>
        <input type="number" name="yearsOfExperience" placeholder="Years of Experience" required>
        <input type="text" name="specialization" placeholder="Specialization" required>
        <input type="text" name="barMembershipNumber" placeholder="Bar Membership Number" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="favoriteLegalField" placeholder="Favorite Legal Field">
        <input type="text" name="preferredCourt" placeholder="Preferred Court">
        <textarea name="bio" placeholder="Bio"></textarea>
        <button type="submit">Create Applicant</button>
    </form>
</body>
</html>
