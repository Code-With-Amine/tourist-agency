let form = document.querySelector('form')
let warningDiv = document.createElement('div')
function validateInput(){
    let inp = document.getElementById('service').value;
    if(inp.includes('_')){
        form.insertBefore(warningDiv, form.firstChild)
        warningDiv.setAttribute('class','alert-danger p-4') // method takes two arguments: the first argument is the new child element that you want to append, and the second argument is the existing child element that you want to insert the new child element before
        warningDiv.innerText = ' The name of the service must not conatin "_" '

        return false
    }
    else{
        return true
    }
}