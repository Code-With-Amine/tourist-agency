let description = document.getElementById('description');
let characters= document.getElementById('char');
description.addEventListener('input',()=>{
    characters.innerHTML = "You wrote " + (description.value).length + " characters."
    if((description.value).length >= 400){
    characters.style.color = 'red'
        }else{
            characters.style.color = 'gray'
        }
})