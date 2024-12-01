<?php
include 'models.php';
session_start();

function handleCreateForm($postData) {
    $data = [
        'firstName' => $postData['firstName'],
        'lastName' => $postData['lastName'],
        'yearsOfExperience' => $postData['yearsOfExperience'],
        'specialization' => $postData['specialization'],
        'barMembershipNumber' => $postData['barMembershipNumber'],
        'email' => $postData['email'],
        'favoriteLegalField' => $postData['favoriteLegalField'],
        'preferredCourt' => $postData['preferredCourt'],
        'bio' => $postData['bio'],
        'created_by' => $_SESSION['username'] // Add created_by
    ];

    return createApplicant($data);
}


function handleUpdateForm($postData, $id) {
    $data = [
        'firstName' => $postData['firstName'],
        'lastName' => $postData['lastName'],
        'yearsOfExperience' => $postData['yearsOfExperience'],
        'specialization' => $postData['specialization'],
        'barMembershipNumber' => $postData['barMembershipNumber'],
        'email' => $postData['email'],
        'favoriteLegalField' => $postData['favoriteLegalField'],
        'preferredCourt' => $postData['preferredCourt'],
        'bio' => $postData['bio'],
    ];

    return updateApplicant($id, $data);
}


function handleSearchForm($searchTerm) {
    return searchApplicants($searchTerm);
}

function handleDeleteRequest($id) {
    return deleteApplicant($id);
}
?>
