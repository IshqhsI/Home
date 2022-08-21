let keyword = document.getElementById('keyword');
let container = document.getElementById('container');
let tes = document.getElementById('tes');

// event keyword
keyword.addEventListener('keyup', function () {
  // Buat ajax
  let ajax = new XMLHttpRequest();

  //   cek ajax
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      container.innerHTML = ajax.responseText;
    }
  };

  ajax.open('GET', 'ajax/index.php?keyword=' + keyword.value, true);

  ajax.send();
});
