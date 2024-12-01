<?php
include 'core/formhandler.php';

$results = [];
$searchMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $searchResult = handleSearchForm($keyword);
    $results = $searchResult['querySet'];

    if (empty($results)) {
        $searchMessage = "No results found.";
    }
} else {
    // Display all applicants by default
    $defaultResult = handleSearchForm('');
    $results = $defaultResult['querySet'];
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
    <title>Lawyer Job Application System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Lawyer Job Application System</h1>
        </header>
        
        <section class="search-section">
            <h2>Search for Lawyers</h2>
            <form method="GET" action="index.php">
                <input type="text" name="search" placeholder="Search by name, specialization, email, etc." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" required>
                <button type="submit">Search</button>
            </form>
            <?php if ($searchMessage): ?>
                <p class="no-results"><?= $searchMessage ?></p>
            <?php endif; ?>
        </section>

        <section class="applicant-list">
            <h2>Applicants List</h2>
            <?php if (!empty($results)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Years of Experience</th>
                            <th>Specialization</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $applicant): ?>
                            <tr>
                                <td><?= htmlspecialchars($applicant['firstName']) ?></td>
                                <td><?= htmlspecialchars($applicant['lastName']) ?></td>
                                <td><?= htmlspecialchars($applicant['yearsOfExperience']) ?></td>
                                <td><?= htmlspecialchars($applicant['specialization']) ?></td>
                                <td><?= htmlspecialchars($applicant['email']) ?></td>
                                <td>
                                    <a href="update.php?id=<?= $applicant['id'] ?>">Edit</a> |
                                    <a href="delete.php?id=<?= $applicant['id'] ?>" onclick="return confirm('Are you sure you want to delete this applicant?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No applicants found.</p>
            <?php endif; ?>
        </section>

        <section class="create-link">
            <a href="create.php">Add New Applicant</a>
            <a href="logout.php">Logout</a>
            <a href="logs.php">View Activity Logs</a>
        </section>
    </div>
</body>
</html>
