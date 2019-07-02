$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('select').formSelect();
    $('.timepicker').timepicker();
    $('.collapsible').collapsible(); 
});
$('.modal').modal({
    dismissible: false,
    opacity: 0.8
});