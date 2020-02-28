


CountBox = 0;

const tambahForm = document.querySelector(".btn_tambah_barang");

tambahForm.addEventListener("click", function (e) {
	let breakNote = document.createElement("br");
	let formGroupforBarang = document.createElement("div");
	formGroupforBarang.classList.add("form-group");

	let formGroupforQty = document.createElement("div");
	formGroupforQty.classList.add("form-group");

	let formGroupforHarga = document.createElement("div");
	formGroupforHarga.classList.add("form-group");

	let input_barang = document.createElement("input");
	input_barang.type = "text";
	input_barang.name = "barang[]";
	input_barang.placeholder = "Masukkan Jenis Barang";
	input_barang.classList.add("form-control");


	let input_qty = document.createElement("input");
	input_qty.type = "number";
	input_qty.name = "qty[]";
	input_qty.placeholder = "Jumlah Barang";
	input_qty.classList.add("form-control");

	let input_harga = document.createElement("input");
	input_harga.type = "number";
	input_harga.name = "harga[]";
	input_harga.placeholder = "Masukkan Harga Barang";
	input_harga.classList.add("form-control");


	let container = document.getElementById("barang");
	container.appendChild(formGroupforBarang);
	formGroupforBarang.appendChild(input_barang);


	let container_qty = document.getElementById("qty");
	container_qty.appendChild(formGroupforQty);
	formGroupforQty.appendChild(input_qty);


	let container_harga = document.getElementById("harga");
	container_harga.appendChild(formGroupforHarga);
	formGroupforHarga.appendChild(input_harga);





	// Masukkan Barang kedalam database
	$('#tambahBarang').click(function () {
		$.ajax({
			url: "<?= base_url('transasksi/tambahTransaksi') ?>",
			type: "post",
			data: $('#form_tambah_barang').serialize(),
			success: function (data) {
				document.location.href = "<?= base_url('transaksi') ?>"
			}
		});
	});


});
