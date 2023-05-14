const searchOrders = document.getElementById('search-input-orders');
searchOrders.addEventListener('input', handleSearch);
function handleSearch() {
    const searchValue = searchOrders.value.toLowerCase();
    const rows = document.querySelectorAll('.tr-orders');
  
    rows.forEach(row => {
      const name = row.querySelector('[data-name]').textContent.toLowerCase();
      const email = row.querySelector('[data-email]').textContent.toLowerCase();
      const phone = row.querySelector('[data-whatssap]').textContent.toLowerCase();
      const date = row.querySelector('[data-date]').textContent.toLowerCase();
      const country = row.querySelector('[data-country]').textContent.toLowerCase();
      const status = row.querySelector('[data-status]').textContent.toLowerCase();
  
      if (name.includes(searchValue)
        || email.includes(searchValue)
        || phone.includes(searchValue)
        || date.includes(searchValue)
        || country.includes(searchValue)
        || status.includes(searchValue)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }
