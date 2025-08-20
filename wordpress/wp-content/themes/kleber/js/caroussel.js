const images = [
    "/wp-content/themes/kleber/assets/images/header/gewoelbe.webp",
    "/wp-content/themes/kleber/assets/images/header/arbeit.webp",
    "/wp-content/themes/kleber/assets/images/header/kran.webp",
    "/wp-content/themes/kleber/assets/images/header/hof.webp",
    "/wp-content/themes/kleber/assets/images/header/feier.webp"
];

let currentImageIndex = 0;
let intervalId = null;
let preloadedImages = [];
let isTimerActive = true;

let startX = 0;
let startY = 0;
let endX = 0;
let endY = 0;
let minSwipeDistance = 50;

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
        dot.addEventListener('click', () => {
            console.log('Dot clicked, going to image:', index);
            goToImage(index, true); // true = manueller Wechsel
        });
        dotsContainer.appendChild(dot);
    });
}

function goToImage(index, manual = false) {
    currentImageIndex = index;
    updateImage();
    updateDots();
    
    if (manual) {
        console.log('Manual navigation - restarting timer');
        restartTimer();
    }
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

function nextImage(manual = false) {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    updateImage();
    updateDots();
    
    if (manual) {
        console.log('Manual next - restarting timer');
        restartTimer();
    }
}

function prevImage(manual = false) {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    updateImage();
    updateDots();
    
    if (manual) {
        console.log('Manual prev - restarting timer');
        restartTimer();
    }
}

function startTimer() {
    if (intervalId) {
        clearInterval(intervalId);
    }
    intervalId = setInterval(() => {
        if (isTimerActive) {
            console.log('Auto slide to next image');
            nextImage(false); // false = automatischer Wechsel
        }
    }, 5000);
    console.log('Timer started with ID:', intervalId);
}

function stopTimer() {
    if (intervalId) {
        clearInterval(intervalId);
        intervalId = null;
        console.log('Timer stopped');
    }
}

function restartTimer() {
    console.log('Restarting timer...');
    stopTimer();
    startTimer();
}

function handleTouchStart(e) {
    startX = e.touches[0].clientX;
    startY = e.touches[0].clientY;
}

function handleTouchEnd(e) {
    endX = e.changedTouches[0].clientX;
    endY = e.changedTouches[0].clientY;
    handleSwipe();
}

function handleSwipe() {
    const deltaX = endX - startX;
    const deltaY = endY - startY;
    
    if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > minSwipeDistance) {
        if (deltaX > 0) {
            console.log('Swipe right - prev image');
            prevImage(true); // true = manueller Wechsel
        } else {
            console.log('Swipe left - next image');
            nextImage(true); // true = manueller Wechsel
        }
    }
}

function handleKeydown(e) {
    if (e.key === 'ArrowLeft') {
        console.log('Key left - prev image');
        prevImage(true);
    } else if (e.key === 'ArrowRight') {
        console.log('Key right - next image');
        nextImage(true);
    }
}

function addEventListeners() {
    container.addEventListener('touchstart', handleTouchStart, { passive: true });
    container.addEventListener('touchend', handleTouchEnd, { passive: true });
    
    document.addEventListener('keydown', handleKeydown);
    
    container.addEventListener('mouseenter', () => {
        console.log('Mouse enter - pause timer');
        isTimerActive = false;
    });
    container.addEventListener('mouseleave', () => {
        console.log('Mouse leave - resume timer');
        isTimerActive = true;
    });
}

function init() {
    if (!container || !dotsContainer) {
        console.error('Container oder Dots-Container nicht gefunden');
        return;
    }
    
    preloadImages();
    createDots();
    updateImage();
    addEventListeners();

    // Timer erst nach dem Laden der Bilder starten
    setTimeout(() => {
        startTimer();
    }, 1000);
}

window.addEventListener('load', init);