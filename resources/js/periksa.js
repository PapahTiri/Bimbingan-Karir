let index = 1;

window.tambahObat = function () {
    const container = document.getElementById('obat-container');
    const newObat = document.createElement('div');
    newObat.className = "flex gap-2 mt-2";

    newObat.innerHTML = window.obatOptionsHTML.replaceAll('__INDEX__', index);

    container.appendChild(newObat);
    index++;
    hitungTotal();
};

window.hitungTotal = function () {
    const selects = document.querySelectorAll('#obat-container select');
    const inputs = document.querySelectorAll('#obat-container input[type="number"]');
    let totalObat = 0;

    selects.forEach((select, i) => {
        const harga = parseInt(select.options[select.selectedIndex]?.dataset.harga || 0);
        const jumlah = parseInt(inputs[i]?.value || 0);
        totalObat += harga * jumlah;
    });

    const totalSemua = 30000 + totalObat;

    const totalObatElem = document.getElementById('total-obat');
    const totalSemuaElem = document.getElementById('total-semua');

    if (totalObatElem) totalObatElem.textContent = formatRupiah(totalObat);
    if (totalSemuaElem) totalSemuaElem.textContent = formatRupiah(totalSemua);
};

function formatRupiah(angka) {
    return 'Rp' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

window.addEventListener('load', hitungTotal);
