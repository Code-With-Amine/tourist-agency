function googleTranslateElementInit() { 
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    const trand = document.querySelector('.goog-te-combo');
       const selectDiv = document.querySelector('.goog-te-combo').parentElement.nextElementSibling; // retrive the span below the select 
       selectDiv.innerHTML = '';
      selectDiv.previousSibling.textContent = ''; // retrive the text content that is before the span element
      trand.classList.add('form-select');
// show and hide the translation when the icon is clicked
      const showTransalation = document.querySelector('.showTransalation');
      showTransalation.addEventListener('click', ()=>{
                        const trand = document.querySelector('.goog-te-combo');
                        trand.classList.toggle("show");
                    
                    
                    // Close the options menu when clicking outside
                    window.addEventListener("click", function(event) {
                        const trand = document.querySelector('.goog-te-combo');
                    
                    var icon = document.querySelector(".showTransalation");
                    if (!trand.contains(event.target) && !icon.contains(event.target)) {
                        trand.classList.remove("show");
                    }
                    })
                });
        }


          


