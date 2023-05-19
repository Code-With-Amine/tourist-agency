const languges = {
    "EN": "English",
    "ES": "Spanish",
    "FR": "French",
}

// translate the webpage
let text = document.querySelector('section').textContent; // get all the text in the website
//let currWebLangauge = document.getElementById('translateTO').value
let translate = document.getElementById('translateTO');

translate.addEventListener('click',()=>{
    let translationURL = `https://api.mymemory.translated.net/set?seg=${text}&langpair=en|${translate.value}`;
    // fetching api response and returining it with parsing into js object
    //and in another then method receving that object
    fetch(translationURL).then(res => res.json().then(data => {
                text = data.responseData.translate;
                console.log(text)
    }))
})




