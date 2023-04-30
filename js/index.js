let WmReasons = document.getElementsByClassName('reason')

WmReasons[0].addEventListener('click',()=>{ // Cultural Heritage

    setBackgroung(0)
    changeImg("images/cultural heritage.jpeg")
    document.getElementById('title').innerHTML = "Cultural Heritage"
    document.getElementById('text').innerHTML = "Morocco's history is a tapestry of different cultures and civilizations that have influenced the country over the centuries. The country's ancient medinas and souks are living museums that offer a glimpse into Morocco's past, while its ornate palaces and historic mosques showcase the country's Islamic heritage. Visitors can explore the winding alleys of the medinas of Fez and Marrakech, marvel at the Roman ruins of Volubilis, or visit the fortified city of Ait Benhaddou, which has been used as a backdrop in several Hollywood movies.";

})
// Simulate a click on the first WmReasons element after adding the event listeners
WmReasons[0].click();


WmReasons[1].addEventListener('click',()=>{ // Moroccan cuisine 
    setBackgroung(1)
    changeImg("images/moroccan-cuisine.jpeg")
    document.getElementById('title').innerHTML = "Moroccan cuisine"
    document.getElementById('text').innerHTML = "Moroccan cuisine is famous for its bold flavors and unique spices. Visitors can sample traditional dishes such as tagine, couscous, and pastilla, which are made with fresh ingredients such as lamb, chicken, or fish, and are often accompanied by a variety of side dishes, including salads and dips. Moroccans also enjoy sweet mint tea, which is a staple of social gatherings and hospitality."
})


WmReasons[2].addEventListener('click',()=>{ // Scenic Beauty
    setBackgroung(2)
    changeImg("images/scenic-beauty.webp")
    document.getElementById('title').innerHTML = "Scenic Beauty"
    document.getElementById('text').innerHTML = "Morocco's scenic beauty is another draw for tourists. The country's varied terrain ranges from the towering Atlas Mountains to the rolling sand dunes of the Sahara Desert. Visitors can hike in the mountains, ski in the winter, or ride camels through the desert. The beaches of Essaouira and Agadir offer the perfect spot to relax and soak up the sun. The country is also home to several national parks and nature reserves that are home to a variety of wildlife, including Barbary macaques and Saharan cheetahs."
})


WmReasons[3].addEventListener('click',()=>{ // Hospitality
    setBackgroung(3)
    changeImg("images/hospitality.jpeg")

    document.getElementById('title').innerHTML = "Hospitality"
    document.getElementById('text').innerHTML = `One of the most notable aspects of Morocco is the hospitality of its people. Moroccans are known for their warm and welcoming nature, and visitors can experience this firsthand by staying in a traditional riad or guesthouse. Many accommodations are decorated with intricate tile work, ornate plaster, and colorful textiles that reflect the country's rich cultural heritage. Visitors can also attend festivals and events that celebrate Morocco's music, art, and food.

   <p> In conclusion, Morocco is a country of endless possibilities, where visitors can explore its rich cultural heritage, marvel at its stunning natural landscapes, indulge in its delicious cuisine, and experience the warmth and hospitality of its people. Whether you are looking for adventure, relaxation, or cultural immersion, Morocco has something for everyone. <p>`
    
})


function setBackgroung(index){
    let newArr = Array.from(WmReasons);
    newArr.forEach(element => {
        element.style.background = "#fff";
    });
    WmReasons[index].style.background = "#6179E6";
}

function changeImg(src){
        document.getElementById('img').src = src
}

/* displaying whatssap */

const whatsappIcon = document.querySelector('.whatsapp-icon');
const messageBox = document.querySelector('.message-box');
const closeIcon = document.querySelector('.close-icon');

whatsappIcon.addEventListener('click', () => {
  messageBox.style.display = 'block';
});

closeIcon.addEventListener('click', () => {
  messageBox.style.display = 'none';
});