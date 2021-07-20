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
    document.body.style.backgroundColor = color;
    localStorage.setItem('mode', mode);
    $("#CheckboxPageMode").attr("checked", isCheck);
}
