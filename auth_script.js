$('.mask-pasport-number').mask('9999 999999');
$('document').ready(function () {
  $('#buttonToCabinet').on('click', function () {
    $('.table .rfield').each(function () {
      if ($(this).val() != '') {
        $(this).removeClass('empty_field');
      } else {
        $(this).addClass('empty_field');
        $("#LoginErrorMessage").hide();
      }
    });
  });
});
function Page() {
  mode = localStorage.getItem('mode');
  if (mode == "dark") {
    TolightMode();
    console.log("TolightMode");
  } else {
    TodarkMode();
    console.log("TodarkMode");
  }
  console.log(mode);
}
function TodarkMode() {
  document.body.style.backgroundColor = "#040040";
  localStorage.setItem('mode', 'dark');
  mode = localStorage.getItem('mode');
}

function TolightMode() {
  document.body.style.backgroundColor = "lightblue";
  localStorage.setItem('mode', 'light');
  mode = localStorage.getItem('mode');
}