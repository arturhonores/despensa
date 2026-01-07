$(document).ready(function () {
    $('#navbar-toggler').click(function () {
        $('#sidebar').removeClass('hidden').addClass('flex')
    })
    $('#sidebar-close').click(()=>{
        $('#sidebar').addClass('hidden').removeClass('flex')
    })
});