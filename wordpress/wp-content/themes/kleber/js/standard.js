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