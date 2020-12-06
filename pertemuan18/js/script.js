// AMBIL ELEMENT YANG DIBUTUHKAN

var keyword = document.getElementById('keyword');
var tombolcari = document.getElementById('tombolcari');
var countainer = document.getElementById('countainer');



// TAMBAH EVENT KETIKA KEYWORD DITULIS
keyword.addEventListener('keyup',function(){


  // KITA BUAT OBJECT AJAX
  var xhr = new XMLHttpRequest();

  // CEK KESIAPAN AJAX
  xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
        countainer.innerHTML = xhr.responseText;
    }
  }
  // EKSEKUSI ajax
  xhr.open('GET','ajax/mahasiswa.php?keyword=' + keyword.value, true);
  xhr.send();


})
