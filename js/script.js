/*let navbar = document.querySelector('.navbar');
*/


let searchform = document.querySelector('.searchform');

document.querySelector('#search-btn').onclick = () =>{
    searchform.classList.toggle('active');
    nav.classList.remove('active');
}

window.onscroll = () =>{
    nav.classList.remove('active');
    searchform.classList.remove('active');
}

var menuIcon = document.querySelector(".menu-icon");
var sidebar = document.querySelector(".sidebar");
var contain = document.querySelector(".contain");
//var searchform = document.querySelector('.searchform');



menuIcon.onclick = function(){
    sidebar.classList.toggle("small-sidebar");
    contain.classList.toggle("large-contain");
    
}


/* const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': 'c7a1ed2f65msh89d163f1a1b56b9p101b5cjsnf7df6362fbc3',
		'X-RapidAPI-Host': 'imdb8.p.rapidapi.com'
	}
};

fetch('https://imdb8.p.rapidapi.com/auto-complete?q=spider%20man%20no%20way%20home', options)
	.then(response => response.json())
	.then(data => {
        const list = data.d;

        list.map((item) => {
            const name = item.l;
            const poster = item.i.imagUrl;
            const movie = <li><img src="${poster}"><h2>${name}</h2>
            </img></li>
            document.querySelector('.movies').innerHTML += movie;
        })
        
    })
	.catch(err => console.error(err)); */