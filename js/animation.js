const hiddenElements = document.querySelectorAll('.hidden')


// the below IntersectionObserver will run each time the visibility of one of the observed elements changes
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        // checking if the element is Intersecting the viewport
        if(entry.isIntersecting){
            entry.target.classList.add('show')
        }
    } )
})

hiddenElements.forEach((element) => observer.observe(element) )
