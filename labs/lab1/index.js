window.onload = emoji;

function emoji() {
    var elem = document.getElementById('emoji');
    var index = 0;
    const emojis = ['&#128513;', '&#128519;', '&#128520'];
    setInterval(() => {
        elem.innerHTML = emojis[index];
        index++;
        if(index == emojis.length) {
            index = 0;
        }
    },200);
}