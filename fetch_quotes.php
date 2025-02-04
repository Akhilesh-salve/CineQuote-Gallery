<?php
include 'db_connect.php';

if (isset($_GET['movie_id'])) {
    $movie_id = intval($_GET['movie_id']);
    $query = "SELECT quote_text FROM quotes WHERE movie_id = $movie_id";
    $result = $conn->query($query);

    $quotes = [];
    while ($row = $result->fetch_assoc()) {
        $quotes[] = $row['quote_text'];
    }

    echo json_encode($quotes);
}
?>
