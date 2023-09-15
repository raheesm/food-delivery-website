const starsContainers = document.querySelectorAll('.stars-container');

starsContainers.forEach(starsContainer => {
  const rating = starsContainer.getAttribute('data-rating');
  const stars = starsContainer.querySelector('.stars');

  for (let i = 1; i <= 5; i++) {
    const star = document.createElement('span');
    star.classList.add('star');
    if (i <= rating) {
      if (i < rating) {
        star.classList.add('filled');
      } else if (rating % 1 !== 0) {
        star.classList.add('half-filled');
      } else {
        star.classList.add('filled');
      }
    }
    stars.appendChild(star);
  }
});
