const input = $("user-input");
let resizeFontBoolean = true;

function resizeFont() {
    if (resizeFontBoolean) {
        input.style.fontSize = "12pt";
        resizeFontBoolean = false;
    }
    let fontSize = parseInt(input.style.fontSize);
    fontSize += 2;
    input.style.fontSize = fontSize + "pt";
}

function setInter() {
    setInterval(resizeFont, 500);
}

function blingFont(event) {
    if(event.target.checked) {
        input.style.fontWeight = "bold";
        input.style.color = "green";
        input.style.textDecorationLine = "underline";
        document.body.style.backgroundImage = "url('https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg')"
    } else {
        input.style.fontWeight = "normal";
    }
}

function upperCaseText() {
    const text = input.value.toUpperCase();
    input.value = appendWord(text);
}

function appendWord(text) {
    const temp = text.split(".");
    temp.splice(1, 0, " -izzle.");
    return temp.join("");
}

$("pimpin-btn").addEventListener("click", setInter);
$("pimpin-check").addEventListener("change", blingFont);
$("snoopify-btn").addEventListener("click", upperCaseText);
