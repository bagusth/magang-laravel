$(document).ready( function() {

    $('#keyword').on('keyup' , function() {
      $('#container').load('ajax/siswa.php?keyword=' + $('#keyword').val());
    });
  
  });