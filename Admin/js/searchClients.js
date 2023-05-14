const searchBar = document.querySelector('#search-input')
searchBar.addEventListener('input',searchInput)

function searchInput(){
    const filter = searchBar.value.toLowerCase();
    const rows = document.querySelectorAll('.tr')
    rows.forEach(row =>{
        const name = row.querySelector('[data-name]').textContent.toLowerCase(); 
        const email = row.querySelector('[data-email]').textContent.toLowerCase();
        const whatsapp = row.querySelector('[data-whatssap]').textContent.toLowerCase();
        const date = row.querySelector('[data-date]').textContent.toLowerCase();
        const status = row.querySelector('[data-status]').textContent.toLowerCase();
        const country = row.querySelector('[data-country]').textContent.toLowerCase();
        const payment = row.querySelector('[data-payment]').textContent.toLowerCase();
        const isPaid = row.querySelector('[data-paid]').textContent.toLowerCase();
        if (name.indexOf(filter) > -1 || email.indexOf(filter) > -1 || whatsapp.indexOf(filter) > -1 || date.indexOf(filter) > -1 || status.indexOf(filter) > -1 || payment.indexOf(filter) > -1 || isPaid.indexOf(filter) > -1 || country.indexOf(filter) > -1) { 
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    })
}