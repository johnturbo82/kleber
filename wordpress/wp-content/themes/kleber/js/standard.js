window.addEventListener('load', function () {
    
    const darkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    function updateDarkMode(e) {
        if (darkScheme.matches) {
            document.body.classList.add('dark');
            document.cookie = "darkmode=1; path=/";
        } else {
            document.body.classList.remove('dark');
            document.cookie = "darkmode=0; path=/";
        }
    }
    updateDarkMode();
    darkScheme.addEventListener('change', updateDarkMode);

    navBar = document.getElementById("header-scrolling");
    visible = false;

    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) {
            if (!visible) {
                unfade(navBar);
                visible = true;
            }
        } else {
            if (visible) {
                fade(navBar);
                visible = false;
            }
        }
    }

    function unfade(element) {
        var op = 0.1;
        element.style.display = 'flex';
        var timer = setInterval(function () {
            if (op >= 1) {
                clearInterval(timer);
            }
            element.style.opacity = op;
            element.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op += op * 0.1;
        }, 10);
    }

    function fade(element) {
        var op = 1;
        var timer = setInterval(function () {
            if (op <= 0.1) {
                clearInterval(timer);
                element.style.display = 'none';
            }
            element.style.opacity = op;
            element.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op -= op * 0.1;
        }, 10);
    }
});


function toggleNav() {
    const nav = document.getElementById("main-navigation");
    console.log(nav);
    if (nav.style.width === "100%") {
        nav.style.width = "0%";
    } else {
        nav.style.width = "100%";
    }
}