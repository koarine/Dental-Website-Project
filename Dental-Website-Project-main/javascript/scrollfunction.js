var viewportHeight = window.innerHeight;
const scrollAmount = viewportHeight*0.85;
let isScrolling = false; 
function smoothScroll(event) {
    if (isScrolling) {
        event.preventDefault();
        return;
    }
    isScrolling = true; 
    event.preventDefault(); 
    const direction = event.deltaY; 
    const scrollTo = window.scrollY + (direction > 0 ? scrollAmount : -scrollAmount);
    window.scrollTo({
        top: scrollTo,
        behavior: 'smooth'
    });
    setTimeout(() => {
        isScrolling = false; 
    }, 500); 
}
window.addEventListener('wheel', smoothScroll); 