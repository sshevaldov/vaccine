window.onload = function () {
    switch (localStorage.getItem('mode')) {
        case "dark":
            SetPageMode("#132f56", "dark", true);
            break;
        default:
            SetPageMode("lightblue", "light", false);
    }
}

function ChangePageMode() {
    if (localStorage.getItem('mode') == "dark") {
        SetPageMode("lightblue", "light", false);
    } else {
        SetPageMode("#132f56", "dark", true);
    }
}

function SetPageMode(color, mode, isCheck) {
    var a = document.getElementsByTagName('a');
    for (var i = 0; i < a.length; i++) {
        a[i].style.color = document.body.style.backgroundColor;
    }
    document.body.style.backgroundColor = color;
    localStorage.setItem('mode', mode);
    $("#CheckboxPageMode").attr("checked", isCheck);
}
