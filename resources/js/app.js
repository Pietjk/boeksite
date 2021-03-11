let btnArray = document.querySelectorAll(".image-button");
document.addEventListener('scroll', getScrollPosition)
btnArray.forEach(function(elem) {
    elem.addEventListener('click', ScrollPositionResetter)
});

function getScrollPosition() {
    var position = window.scrollY;
    return position;
}

function ScrollPositionResetter() {
    position = getScrollPosition();

    disableScroll();
    setTimeout(() => { window.scrollTo(0, position) }, 5);
    enableScroll();
    console.log(position);
}

function disableScroll() { 
    // Get the current page scroll position 
    scrollTop = window.pageYOffset || document.documentElement.scrollTop; 
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft, 

        // if any scroll is attempted, set this to the previous value 
        window.onscroll = function() { 
            window.scrollTo(scrollLeft, scrollTop); 
        }; 
} 

function enableScroll() { 
    window.onscroll = function() {}; 
}