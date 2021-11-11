var likeNode = document.getElementById("like");
var likeButton = document.getElementById('likeButton');

const totalStars = 10;
likeNode.addEventListener('click', () => {
	if (!likeButton.classList.contains('like-active'))
	{
		likeButton.classList.add('like-active');
		console.log('clc')
	}else{
		likeButton.classList.remove('like-active');
	}
});

const rating = document.getElementById('text-rating').textContent;
numRating = Number(rating);
console.log(typeof (numRating));
document.addEventListener('DOMContentLoaded', getRating);

function getRating() {
	const starPercentage = numRating / totalStars * 100;
	const starPercentageRounded = `${Math.round(starPercentage/10)*10}%`;
	document.querySelector(`.stars-inner`).style.width = starPercentageRounded;
	document.querySelector(`.movie-info__content-rating-number`).innerHTML = rating
}
