$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('select').formSelect();
    $('.timepicker').timepicker();
    $('.datepicker').datepicker({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15, // Creates a dropdown of 15 years to control year
      format: 'yyyy-mm-dd' });
    $('.collapsible').collapsible(); 
    $('.slider').slider({full_width: true});
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
     });
});
