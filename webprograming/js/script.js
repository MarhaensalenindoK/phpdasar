$(document).ready(function(){
  // hilangkan tombol tombolcari
  $('#tombolcari').hide();
  // event ketika keyword ditulis

  $('#keyword').on('keyup',function(){
    // munculkan icon loading
    $('.loader').show();
    // ajax menggunakan load
      // $('#countainer').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

      // $.get()
      $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(),function(data){

        $('#countainer').html(data);
        $('.loader').hide();
      });

  });

});
