window.onload = function () {
    console.log(localStorage.getItem('mode'));
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
    console.log(localStorage.getItem('mode'))
    switch(mode) {
        case "light": {
            var a = document.getElementsByTagName('a');
            for (var i = 0; i < a.length; i++) {
                a[i].style.color = "#132f56";
            }
          break;
        }
        case "dark": {
            var a = document.getElementsByTagName('a');
            for (var i = 0; i < a.length; i++) {
                a[i].style.color = "lightblue";
            }
          break;
        }
        
      }
    // var a = document.getElementsByTagName('a');
    // for (var i = 0; i < a.length; i++) {
    //     a[i].style.color = document.body.style.backgroundColor;
    // }
    document.body.style.backgroundColor = color;
    localStorage.setItem('mode', mode);
    $("#CheckboxPageMode").attr("checked", isCheck);
}
