let images = [];
let currentImageIndex = 0;
let intervalId = null;
let isTimerActive = true;

let startX = 0;
let startY = 0;
let endX = 0;
let endY = 0;
let minSwipeDistance = 50;

const container = document.getElementById('imageContainer');
const dotsContainer = document.getElementById('navigationDots');

function loadImagesFromDOM() {
    const imageElements = container.querySelectorAll('img');
    images = Array.from(imageElements).map(img => img.src);
}

function createDots() {
    images.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.className = 'dot';
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => {
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
        restartTimer();
    }
}

function prevImage(manual = false) {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    updateImage();
    updateDots();
    
    if (manual) {
        restartTimer();
    }
}

function startTimer() {
    if (intervalId) {
        clearInterval(intervalId);
    }
    intervalId = setInterval(() => {
        if (isTimerActive) {
            nextImage(false);
        }
    }, 5000);
}

function stopTimer() {
    if (intervalId) {
        clearInterval(intervalId);
        intervalId = null;
    }
}

function restartTimer() {
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
            prevImage(true); // true = manueller Wechsel
        } else {
            nextImage(true); // true = manueller Wechsel
        }
    }
}

function handleKeydown(e) {
    if (e.key === 'ArrowLeft') {
        prevImage(true);
    } else if (e.key === 'ArrowRight') {
        nextImage(true);
    }
}

function addEventListeners() {
    container.addEventListener('touchstart', handleTouchStart, { passive: true });
    container.addEventListener('touchend', handleTouchEnd, { passive: true });
    
    document.addEventListener('keydown', handleKeydown);
    
    container.addEventListener('mouseenter', () => {
        isTimerActive = false;
    });
    container.addEventListener('mouseleave', () => {
        isTimerActive = true;
    });
}

function init() {
    if (!container || !dotsContainer) {
        console.error('Container oder Dots-Container nicht gefunden');
        return;
    }
    
    loadImagesFromDOM();
    createDots();
    updateImage();
    addEventListeners();

    setTimeout(() => {
        startTimer();
    }, 1000);
}

window.addEventListener('load', init);