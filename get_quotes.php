<?php
header('Content-Type: application/json');

// In a real application, you'd probably fetch from a database
$movies = [
    1 => [
        "He remembers those vanished years...",
        "I didn't think you'd fall in love with me.",
        "Feelings can creep up just like that."
    ]
];

$movieId = $_GET['movie_id'] ?? 0;

if (isset($movies[$movieId])) {
    echo json_encode($movies[$movieId]);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Movie not found']);
}
?>