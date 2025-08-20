const images = [
    "/wp-content/themes/kleber/assets/images/header/gewoelbe.webp",
    "/wp-content/themes/kleber/assets/images/header/arbeit.webp",
    "/wp-content/themes/kleber/assets/images/header/kran.webp",
    "/wp-content/themes/kleber/assets/images/header/hof.webp",
    "/wp-content/themes/kleber/assets/images/header/feier.webp"
];

let currentImageIndex = 0;
let intervalId;
let preloadedImages = [];

const container = document.getElementById('imageContainer');
const dotsContainer = document.getElementById('navigationDots');

function preloadImages() {
    images.forEach((imageSrc, index) => {
        const img = new Image();
        img.onload = () => {
            console.log(`Bild ${index + 1} geladen:`, imageSrc);
        };
        img.src = imageSrc;
        preloadedImages.push(img);
    });
}

function createDots() {
    images.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.className = 'dot';
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToImage(index));
        dotsContainer.appendChild(dot);
    });
}

function goToImage(index) {
    currentImageIndex = index;
    updateImage();
    updateDots();
    resetInterval();
}

function updateImage() {
    container.style.backgroundImage = `url("${images[currentImageIndex]}")`;
}

function updateDots() {
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentImageIndex);
    });
}

function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    updateImage();
    updateDots();
}

function resetInterval() {
    clearInterval(intervalId);
    intervalId = setInterval(nextImage, 5000);
}

function init() {
    preloadImages();
    createDots();
    updateImage();

    setTimeout(() => {
        intervalId = setInterval(nextImage, 5000);
    }, 1000);
}

window.addEventListener('load', init);