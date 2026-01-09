$(document).ready(function () {
    $('#navbar-toggler').click(function () {
        $('#sidebar').removeClass('-translate-x-full').addClass('translate-x-0')
    })
    $('#sidebar-close').click(()=>{
        $('#sidebar').addClass('-translate-x-full').removeClass('translate-x-0')
    })
});