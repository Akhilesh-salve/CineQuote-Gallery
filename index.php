<?php
$movies = [
    'in_the_mood_for_love' => [
        'name'   => 'In the Mood for Love',
        'image'  => 'https://m.media-amazon.com/images/I/61FPE3aoPyL._SL1500_.jpg',
        'quotes' => [
            "You never have to face reality alone.",
            "A secret love can be a story of beauty or sorrow.",
            "Sometimes the heart sees what is invisible to the eye."
        ]
    ],
    'fallen_angels' => [
        'name'   => 'Fallen Angels',
        'image'  => 'https://m.media-amazon.com/images/I/81ArZYd22+L._SL1500_.jpg',
        'quotes' => [
            "I've always believed that good things never last.",
            "It's easier to get close to someone in the rain.",
            "Some people are just meant to pass by each other."
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CineQuote Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #e74c3c;
            --accent1: #3498db;
            --accent2: #2ecc71;
            --accent3: #9b59b6;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: #f8f9fa;
            color: var(--primary);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
            opacity: 0;
            animation: fadeInDown 0.8s 0.3s forwards;
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            opacity: 0;
            animation: fadeIn 0.8s 0.5s forwards;
        }

        .movie-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.12);
        }

        .movie-image {
            width: 100%;
            height: 380px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .movie-card:hover .movie-image {
            transform: scale(1.03);
        }

        .movie-title {
            padding: 1.2rem;
            text-align: center;
            font-weight: 600;
            font-size: 1.1rem;
            background: linear-gradient(to right, var(--primary), #34495e);
            color: white;
        }

        .quotes-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
            opacity: 0;
            animation: fadeIn 0.6s forwards;
        }

        .quote-card {
            padding: 2rem;
            border-radius: 12px;
            color: white;
            position: relative;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s forwards;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .quote-card:nth-child(odd) { background: var(--secondary); }
        .quote-card:nth-child(even) { background: var(--accent1); }
        .quote-card:nth-child(3n) { background: var(--accent3); }
        .quote-card:nth-child(4n) { background: var(--accent2); }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin: 2rem auto;
            padding: 0.8rem 1.5rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .back-btn:hover {
            transform: translateX(-5px);
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hidden { display: none; }

        .loading {
            text-align: center;
            padding: 2rem;
            font-size: 1.2rem;
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .container {
                margin: 1rem auto;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .quote-card {
                font-size: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>CineQuote Gallery</h1>
        <p>Discover memorable quotes from iconic films</p>
    </div>

    <?php if (!isset($_GET['movie'])): ?>
        <div class="movies-grid">
            <?php foreach ($movies as $key => $movie): ?>
                <a href="?movie=<?= $key ?>" class="movie-card">
                    <img src="<?= $movie['image'] ?>" alt="<?= $movie['name'] ?>" class="movie-image">
                    <div class="movie-title"><?= $movie['name'] ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php else: 
        $movieKey = $_GET['movie'];
        if (isset($movies[$movieKey])):
            $movie = $movies[$movieKey];
    ?>
        <button onclick="window.history.back()" class="back-btn">
            ← Back to Movies
        </button>
        
        <div class="header">
            <h1><?= $movie['name'] ?></h1>
            <p>Iconic Quotes Collection</p>
        </div>

        <div class="quotes-container">
            <?php foreach ($movie['quotes'] as $index => $quote): ?>
                <div class="quote-card" style="animation-delay: <?= $index * 0.1 ?>s">
                    <?= $quote ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="loading">
            <p>Movie not found. Please try another selection.</p>
            <button onclick="window.history.back()" class="back-btn">
                ← Back to Movies
            </button>
        </div>
    <?php endif; endif; ?>
</div>
</body>
</html>