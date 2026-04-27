document.addEventListener('DOMContentLoaded', function () {
    // 1. Ambil semua tombol detail yang ada di halaman
    const buttons = document.querySelectorAll('.btn-detail-transaksi');

    // 2. Berikan event listener 'click' untuk masing-masing tombol
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            // 3. Cari elemen <section> terdekat yang membungkus tombol ini
            const parentSection = this.closest('section');

            // 4. Cari elemen detail hanya di dalam <section> yang sama
            const detailDiv = parentSection.querySelector('.detail-transaksi');

            // 5. Toggle class 'hidden' (kalau ada akan dihilangkan, kalau tidak ada akan ditambah)
            if (detailDiv) {
                detailDiv.classList.toggle('hidden');
            }
        });
    });
});