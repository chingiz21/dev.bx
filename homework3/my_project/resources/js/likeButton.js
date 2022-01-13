// import {toggleElem} from "./toggle.js";

var likeNode = document.getElementById("like");
var likeButton = document.getElementById('likeButton');
var notifyNode = document.getElementById('notifyId');
var movieName = document.getElementById('movieName');


//likeButton & notify
likeNode.addEventListener('click', () => {
	if (!likeButton.classList.contains('like-active'))
	{
		likeButton.classList.add('like-active');
		notifyNode.innerText = 'Фильм "' + movieName.innerText + '" добавлен в избранное';
		notifyNode.classList.add('notify-show');
		setTimeout(() => {
			notifyNode.classList.remove('notify-show');
		}, 2000);
	}else{
		likeButton.classList.remove('like-active');
	}
});

//rating stars
const totalStars = 10;
const rating = document.getElementById('text-rating').textContent;
numRating = Number(rating);
document.addEventListener('DOMContentLoaded', getRating);

function getRating() {
	const starPercentage = numRating / totalStars * 100;
	const starPercentageRounded = `${Math.round(starPercentage/10)*10}%`;
	document.querySelector(`.stars-inner`).style.width = starPercentageRounded;
	document.querySelector(`.movie-info__content-rating-number`).innerHTML = rating
}

//hamburger actions
let hamburger = document.getElementById("hamb");
let nav = document.getElementById("nav");
let style = getComputedStyle(nav);
console.log(style);

function toggleElem(el) {
	el.style.display = (style.display == 'none') ? 'block' : 'none'
}

hamburger.addEventListener("click", () => {
	hamburger.classList.toggle("is-active");
	// nav.style.display = "inline";
	// nav.style.transition = "all .3s ease";
	toggleElem(nav);
})