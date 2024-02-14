const selectSize = document.querySelectorAll('.product__size-item');

selectSize.forEach(function (item) {
    item.addEventListener('click', function () {
        selectSize.forEach(function (item){
            item.style.border = '0.8px solid rgb(216, 215, 215)';
        })

        let computedStyle = window.getComputedStyle(item);
        let currentBorderStyle = computedStyle.getPropertyValue('border');

        if (currentBorderStyle == '0.8px solid rgb(216, 215, 215)') {
            item.style.border = "1px solid #000";
        } else {
            item.style.border = "1px solid #d8d7d7";
        }
    });
});


// Rating
// const voteRatings = document.querySelectorAll('.product__sub-info-rating>i');
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.product__sub-info-rating>i');

    // Sự kiện hover
    stars.forEach(function (star, index) {
        star.addEventListener('mouseover', function () {
            for (let i = 0; i <= index; i++) {
                stars[i].style.color = 'gold';
            }
        });

        star.addEventListener('mouseout', function () {
            stars.forEach(function (star) {
                star.style.color = '';
            });
        });

        star.addEventListener('click', function () {
            stars.forEach(function (star) {
                star.style.color = '';
            });
            for (let i = 0; i <= index; i++) {
                stars[i].style.color = 'gold';
            }
        });
    });
});

//click heart icon on related product
const favoriteItems = document.querySelectorAll('.product__item-favorite>i');
favoriteItems.forEach(function (item) {
    item.addEventListener('click', function () {
        this.classList.toggle('fa-solid');
        this.classList.toggle('fa-regular');
    });
});

