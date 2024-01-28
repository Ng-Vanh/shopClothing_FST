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

