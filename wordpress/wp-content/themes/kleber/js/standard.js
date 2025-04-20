window.addEventListener('load', function () {
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
