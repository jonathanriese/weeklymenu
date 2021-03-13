
let iconMenu = document.querySelector('.bodymovinanim');

let animationMenu = bodymovin.loadAnimation({
        container: iconMenu,
        renderer: 'svg',
        loop: false,
        autoplay: false,
        path: "https://raw.githubusercontent.com/thesvbd/Lottie-examples/master/assets/animations/menu.json"
});

var directionMenu = 1;
    iconMenu.addEventListener('click', (e) => {
    animationMenu.setDirection(directionMenu);
    animationMenu.play();
    directionMenu = -directionMenu;
});