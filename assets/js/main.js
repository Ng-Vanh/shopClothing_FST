let slideIndex = 0;

function showSlides() {
    let i;
    const slides = document.querySelectorAll(".slide");
    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    
    slideIndex++;
    
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }    
    
    slides[slideIndex - 1].style.display = "block";  
    setTimeout(showSlides, 6000); 
}

document.addEventListener("DOMContentLoaded", showSlides);
// ========================

let chooseSizes = document.querySelectorAll(".sort__size-attribute-item");

chooseSizes.forEach(function(element) {
    element.addEventListener("click", function() {
        chooseSizes.forEach(function(item) {
            item.style.background = "#fff";
        });
        this.style.background = "#ccc";
    });
});


let colorCircles = document.querySelectorAll(".color_circle");

colorCircles.forEach(function(container) {
    container.addEventListener("click", function() {
        // Assuming the color circles are the direct children of the container
        let colorCirclesChecked = container.querySelectorAll("i");

        colorCirclesChecked.forEach(function(item) {
            item.style.display = "none";
        });

        // Toggle the display of the clicked color circle
        let clickedColorCircle = this.querySelector("i");
        if (clickedColorCircle) {
            clickedColorCircle.style.display = "block";
        }
    });
});


const sortSizeToggleBtn = document.getElementById('sortSizeToggleBtn');
const sizeContent = document.getElementById('sizeContent');

sortSizeToggleBtn.addEventListener('click', function () {
        sizeContent.classList.toggle('show');
        sortSizeToggleBtn.classList.toggle('fa-plus');
        sortSizeToggleBtn.classList.toggle('fa-minus');
    });

const sortColorBtn = document.querySelector('.sort__color-header>i');
const colorContent = document.querySelector('.sort__color-content')
sortColorBtn.addEventListener('click', function () {
    colorContent.classList.toggle('show');
    sortColorBtn.classList.toggle('fa-plus');
    sortColorBtn.classList.toggle('fa-minus');
});
const sortPriceBtn = document.querySelector('.sort__price-header>i');
const priceContent = document.querySelector('.sort__price-content');
sortPriceBtn.addEventListener('click', function () {
    priceContent.classList.toggle('showFlexCenter');
    sortPriceBtn.classList.toggle('fa-plus');
    sortPriceBtn.classList.toggle('fa-minus');
});

const sortDiscountBtn = document.querySelector('.sort__discount-header>i');
const discountContent = document.querySelector('.sort__discount-content');
sortDiscountBtn.addEventListener('click', function () {
    discountContent.classList.toggle('showFlexStart');
    sortDiscountBtn.classList.toggle('fa-plus');
    sortDiscountBtn.classList.toggle('fa-minus');
});