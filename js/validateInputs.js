let inquiryField = document.getElementById('message')
inquiryField.addEventListener('input',()=>{
    document.getElementById('chars').innerHTML = 'you wrote :' + (inquiryField.value).length
})
function isItValide(){
    if((inquiryField.value).length <= 4000){
        return true
    }else{
        alert("please don't write more than 4000 character in your inquiry")
        return false
    }
}