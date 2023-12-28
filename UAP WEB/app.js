
function hitungTotal() {
    var idBarang = document.getElementById("idBarang").value;
    var jumlahBarang = parseInt(document.getElementById("jumlahBarang").value);

    var price = 0;

    switch (idBarang) {
        case "001":
            price = 10000;
            break;
        case "002":
            price = 20000;
            break;
        case "003":
            price = 30000;
            break;
        default:
            alert("Kode barang tidak valid");
            return;
    }

    var grandTotal = price * jumlahBarang;

    alert("Grand Total: Rp " + grandTotal);

    var jumlahBayar = prompt("Masukkan jumlah uang yang akan dibayarkan:");
    jumlahBayar = parseFloat(jumlahBayar);

    var kembalian = jumlahBayar - grandTotal;

    if (kembalian >= 0) {
        alert("Total Kembalian: Rp " + kembalian);
    } else {
        alert("Uang anda tidak cukup");
    }
}
