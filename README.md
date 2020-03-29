Website ini merupakan website untuk mengelola keuangan perusahaan CV. Anton Natuna.

Website ini memiliki fitur fitur diantaranya:
  1. Mengelola data admin(change password, edit_profile dan menampilkan profile)
  2. Mengelola data pelanggan
  3. Mengelola access menu
  4. Mengelola Data Transaksi Pelanggan
  5. Dapat mencetak invoice dan surat jalan
  6. Mengelola data Laporan Kas Harian
  7. Mengelola Data Piutang Pelanggan
  8. Mengelola Data Biaya(Pengeluaran) Perusahaan

  







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
	input_qty.classList.add("form-control", "quantity");

	let input_harga = document.createElement("input");
	input_harga.type = "number";
	input_harga.name = "harga[]";
	input_harga.placeholder = "Harga Barang";
	input_harga.classList.add("form-control", "input_harga");

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

