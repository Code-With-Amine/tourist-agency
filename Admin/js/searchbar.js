    const searchInput = document.getElementById('search-input');// i got the search field
    searchInput.addEventListener('input', searchInquiries);

    function searchInquiries() {
        const filter = searchInput.value.toUpperCase(); // i maade the search input case insensitive
        const rows = document.querySelectorAll('.tr');// retrive all the rows in the html

        rows.forEach(row => { // i loop each row in the html
            const name = row.querySelector('[data-name]').textContent.toUpperCase(); // I retrived the name from the row which has the [data-name however i make the content uppercase to fit the content in the search bar in order to make them equal in other word case insensitive
            const email = row.querySelector('[data-email]').textContent.toUpperCase();
            const whatsapp = row.querySelector('[data-whatssap]').textContent.toUpperCase();
            const date = row.querySelector('[data-date]').textContent.toUpperCase();
            const status = row.querySelector('[data-status]').textContent.toUpperCase();

            if (name.indexOf(filter) > -1 || email.indexOf(filter) > -1 || whatsapp.indexOf(filter) > -1 || date.indexOf(filter) > -1 || status.indexOf(filter) > -1) { // if the index of that searched value dosent exsiste in any of the rows go ahead and hide it or show it
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

   