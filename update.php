<?php
include 'core/formhandler.php';

$id = $_GET['id'];
$applicant = getApplicantById($id)['querySet'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = handleUpdateForm($_POST, $id);

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
    <title>Update Applicant</title>
</head>
<body>
    <h1>Update Applicant</h1>
    <form method="POST" action="update.php?id=<?= $id ?>">
        <input type="text" name="firstName" value="<?= $applicant['firstName'] ?>" required>
        <input type="text" name="lastName" value="<?= $applicant['lastName'] ?>" required>
        <input type="number" name="yearsOfExperience" value="<?= $applicant['yearsOfExperience'] ?>" required>
        <input type="text" name="specialization" value="<?= $applicant['specialization'] ?>" required>
        <input type="text" name="barMembershipNumber" value="<?= $applicant['barMembershipNumber'] ?>" required>
        <input type="email" name="email" value="<?= $applicant['email'] ?>" required>
        <input type="text" name="favoriteLegalField" value="<?= $applicant['favoriteLegalField'] ?>">
        <input type="text" name="preferredCourt" value="<?= $applicant['preferredCourt'] ?>">
        <textarea name="bio"><?= $applicant['bio'] ?></textarea>
        <button type="submit">Update Applicant</button>
    </form>
</body>
</html>
