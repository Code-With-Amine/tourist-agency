const cards = document.querySelectorAll('.comment');
const arrowsLeft = document.querySelectorAll('.arrow-left');
const arrowsRight = document.querySelectorAll('.arrow-right');

let currentCard = 0;

// Hide all cards except the first one
for (let i = 1; i < cards.length; i++) {
  cards[i].classList.add('hideComment');
}

// Add event listeners to arrows
arrowsLeft.forEach((arrow) => {
  arrow.addEventListener('click', () => {
    if (currentCard > 0) {
      cards[currentCard].classList.add('hideComment');
      currentCard--;
      cards[currentCard].classList.remove('hideComment');
    }
  });
});

arrowsRight.forEach((arrow) => {
  arrow.addEventListener('click', () => {
    if (currentCard < cards.length - 1) {
      cards[currentCard].classList.add('hideComment');
      currentCard++;
      cards[currentCard].classList.remove('hideComment');
    }
  });
});
