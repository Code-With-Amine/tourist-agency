document.querySelector('form').addEventListener('submit', search);
function search(event) {
    event.preventDefault(); // prevent the form from submitting normally
    const searchText = document.querySelector('input').value;
    const pageContent = document.querySelector('#page-content');
    const matches = pageContent.querySelectorAll('*');
    if(searchText.trim() == '' ){
        return;
    }
    matches.forEach(match => {
      if (match.textContent.split(' ').includes(searchText)) {
        let oldText = match.innerHTML;
        match.innerHTML = match.innerHTML.replace(new RegExp(`\\b${searchText}\\b`, 'gi'), '<mark>$&</mark>');
// after 1 minutes the mark will be removed
        const minutes = 1; // set the number of minutes to count
        const interval = minutes * 60 * 1000; // convert minutes to milliseconds

        const timer = setInterval(function() {
             match.innerHTML = oldText;
        }, interval);

      }
    });
  }
  