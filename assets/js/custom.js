


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

	let formGroupforSatuan = document.createElement("div");
	formGroupforSatuan.classList.add("form-group");

	let formGroupforTotalHarga = document.createElement("div");
	formGroupforTotalHarga.classList.add("form-group");

	let input_barang = document.createElement("input");
	input_barang.type = "text";
	input_barang.name = "barang[]";
	input_barang.placeholder = "Masukkan Jenis Barang";
	input_barang.classList.add("form-control");


	let input_qty = document.createElement("input");
	input_qty.type = "number";
	input_qty.name = "qty[]";
	input_qty.placeholder = "Qty";
	input_qty.classList.add("form-control");

	let input_harga = document.createElement("input");
	input_harga.type = "number";
	input_harga.name = "harga[]";
	input_harga.placeholder = "Harga Barang";
	input_harga.classList.add("form-control", "harga_barang");

	let input_satuan = document.createElement("input");
	input_satuan.type = "text";
	input_satuan.name = "satuan[]";
	input_satuan.placeholder = "Satuan Barang";
	input_satuan.classList.add("form-control");

	let input_total_harga_barang = document.createElement("input");
	input_total_harga_barang.type = "text";
	input_total_harga_barang.name = "total_harga_barang[]";
	input_total_harga_barang.placeholder = "Total Harga Barang";
	input_total_harga_barang.classList.add("form-control", "total_harga_barang");


	let container = document.getElementById("barang");
	container.appendChild(formGroupforBarang);
	formGroupforBarang.appendChild(input_barang);


	let container_qty = document.getElementById("qty");
	container_qty.appendChild(formGroupforQty);
	formGroupforQty.appendChild(input_qty);


	let container_harga = document.getElementById("harga");
	container_harga.appendChild(formGroupforHarga);
	formGroupforHarga.appendChild(input_harga);

	let container_satuan = document.getElementById("satuan");
	container_satuan.appendChild(formGroupforSatuan);
	formGroupforSatuan.appendChild(input_satuan);

	let container_total_harga_barang = document.getElementById("total_harga_barang");
	container_total_harga_barang.appendChild(formGroupforTotalHarga);
	formGroupforTotalHarga.appendChild(input_total_harga_barang);

	let totalHargaBarangValue = document.querySelector('.total_harga_barang');

	totalHargaBarangValue.addEventListener('onchange', function () {
		document.querySelector('#input_qty').value * document.querySelector('#input_harga').value;
	});

	$('.form-group').on('input', '.total_harga_barang', function () {
		var totalSum = 0;
		$('.form-group .total_harga_barang').each(function () {
			var inputVal = $(this).val();
			if ($.isNumeric(inputVal)) {
				totalSum += parseFloat(inputVal);
			}
		});


		var totalHarga = totalSum
		$('.total_harga').val(totalHarga);
	});



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
