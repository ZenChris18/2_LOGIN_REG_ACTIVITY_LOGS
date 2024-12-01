<?php
include 'core/formhandler.php';

$results = [];
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $searchResult = handleSearchForm($keyword);
    $results = $searchResult['querySet'];
}
?>
