//Choose size on navbar
let chooseSizes = document.querySelectorAll(".sort__size-attribute-item");

chooseSizes.forEach(function(element) {
    element.addEventListener("click", function() {
        chooseSizes.forEach(function(item) {
            item.style.background = "#fff";
        });
        this.style.background = "#ccc";
    });
});



//Choose circle color on navbar
let colorCirclesChecked = document.querySelectorAll(".color_circle>i");
let colorCircles = document.querySelectorAll(".color_circle");
colorCirclesChecked.forEach(function(container) {
    container.style.display = "none";
});
colorCircles.forEach(function(item){
    item.addEventListener("click", function() {
        let curChecked = item.querySelector('i');
        if(curChecked.style.display== 'none'){
            curChecked.style.display = 'block';
        }else{
            curChecked.style.display = 'none';
        }
    });
})

//Click '+/-' button to show detail
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

//Click heart btn on product card
const favoriteItems = document.querySelectorAll('.product__item-favorite>i');
favoriteItems.forEach(function (item) {
    item.addEventListener('click', function () {
        this.classList.toggle('fa-solid');
        this.classList.toggle('fa-regular');
    });
});

