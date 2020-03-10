// ambil elemen
var kataKunci = document.getElementById('katakunci');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');


// tambahkan event saat menulis kata kunci
kataKunci.addEventListener('keyup', function () {
	// buat objek ajax
	var xhr = new XMLHttpRequest();

	// cek kesiapan objek
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200) {
			container.innerHTML = xhr.responseText;
		}
	}

	// eksekusi ajax
	xhr.open('GET', 'ajax/penduduk.php?katakunci=' + kataKunci.value, true);
	xhr.send();
})