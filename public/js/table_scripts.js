$(document).ready(function(){
    $('#myTable').pageMe({
      pagerSelector:'#myPager',
      activeColor: 'blue',
      prevText:'Anterior',
      nextText:'Siguiente',
      showPrevNext:true,
      hidePageNumbers:false,
      perPage:10
    });
  });