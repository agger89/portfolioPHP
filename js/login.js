// login progress bar
function move() {
    var elem = document.getElementById("login-bar");
    var width = 1;
    var id = setInterval(frame, 12);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width++;
            elem.style.width = width + '%';
        }
    }
}