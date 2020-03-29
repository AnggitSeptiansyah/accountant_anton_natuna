

this.count = 0;

document.addEventListener("click", (e) => {
	const type = e.target.id;

	if (type == "button") {
		const container = document.getElementById('container_input_barang');
		++this.count;

		const transaksi_barang = document.createElement('div');
		transaksi_barang.className = "row";

		const input_transaksi = `
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Barang yang Dipesan</label>
					<input type="text" class="form-control"  name="barang[]" id="barang-${this.count}">
				</div>
			</div>
			<div class="col-md-1">
				<div class="form-group">
					<label for="">Qty</label>
					<input type="text" value="0" class="form-control quantity" name="qty[]" id="qty-${this.count}">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label for="">Satuan</label>
					<input type="text" class="form-control" name="satuan[]" id="satuan-${this.count}">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label for="">Harga</label>
					<input type="text" class="form-control input_harga" value="0" name="harga[]" id="harga-${this.count}">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="">Total Harga Barang</label>
					<input type="text" class="form-control total_harga_barang" value="0" name="total_harga_barang[]" value="0" id="total_harga_barang-${this.count}">
				</div>
			</div>
		`

		transaksi_barang.innerHTML += input_transaksi;

		container.appendChild(transaksi_barang);
	}
});

document.addEventListener('keyup', (e) => {
	const type = e.target.id.split("-")[0]

	if (type == "qty") {
		changeQty(e);
	} else if (type == "harga") {
		changePrice(e);
	}


})

const counting = (price, qty) => {
	return price * qty;
}

const changePrice = (e) => {
	const id = e.target.id.split("-")[1];

	const qty = document.getElementById("qty-" + id).value;
	const amount = document.getElementById("total_harga_barang-" + id);

	const count = counting(parseInt(qty), parseInt(e.target.value));

	amount.value = count;
}

const changeQty = (e) => {
	const id = e.target.id.split("-")[1];

	const price = document.getElementById("harga-" + id).value;
	const amount = document.getElementById("total_harga_barang-" + id);

	const count = counting(parseInt(price), parseInt(e.target.value));

	amount.value = count;
}


document.addEventListener("keyup", (e) => {

	const grandTotalPrice = document.getElementById('grandPrice');
	const price = document.querySelectorAll('.total_harga_barang');

	let grandTotal = 0;
	for (let i = 0; i < price.length; i++) {

		grandTotal += parseInt(price[i].value);
	}

	grandTotalPrice.value = grandTotal;

})

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
