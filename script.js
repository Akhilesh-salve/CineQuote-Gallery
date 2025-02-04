document.addEventListener('DOMContentLoaded', () => {
    const movieBoxes = document.querySelectorAll('.movie-box');
    const quotesContainer = document.getElementById('quotes-container');
    
    movieBoxes.forEach(box => {
        box.addEventListener('click', async () => {
            const movieId = box.dataset.movieId;
            
            try {
                const response = await fetch(`get_quotes.php?movie_id=${movieId}`);
                const quotes = await response.json();
                
                quotesContainer.innerHTML = '';
                quotesContainer.classList.remove('hidden');
                
                quotes.forEach((quote, index) => {
                    const quoteBox = document.createElement('div');
                    quoteBox.className = `quote-box color${(index % 5) + 1}`;
                    quoteBox.textContent = quote;
                    quoteBox.style.animationDelay = `${index * 0.1}s`;
                    quotesContainer.appendChild(quoteBox);
                });
                
            } catch (error) {
                console.error('Error fetching quotes:', error);
            }
        });
    });
});