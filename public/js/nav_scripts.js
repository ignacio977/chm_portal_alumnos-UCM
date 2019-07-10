$(document).ready(function(){
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.timepicker').timepicker();
    $('.datepicker').datepicker({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15, // Creates a dropdown of 15 years to control year
      format: 'yyyy-mm-dd' });
    $('.collapsible').collapsible(); 
    $('.modal').modal({
      dismissible: false,
      opacity: 0.8
    });
    $('.slider').slider({full_width: true});
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
     });
});
