<?php
$movies = [
    [
        'id' => 1,
        'title' => 'In the Mood for Love',
        'image' => 'path/to/image1.jpg',
        'quotes' => [
            "He remembers those vanished years. As though looking through a dusty window pane, the past is something he could see, but not touch.",
            "I didn't think you'd fall in love with me.",
            "Feelings can creep up just like that."
        ]
    ],
    // Add more movies here
];
?>

<?php foreach ($movies as $movie): ?>
    <div class="movie-box" data-movie-id="<?= $movie['id'] ?>">
        <img src="<?= $movie['image'] ?>" alt="<?= $movie['title'] ?>" class="movie-image">
        <h3 class="movie-title"><?= $movie['title'] ?></h3>
    </div>
<?php endforeach; ?>