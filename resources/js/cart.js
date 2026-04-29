document.addEventListener("DOMContentLoaded", function () {
    const cartContainer = document.getElementById("cart-container");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

    if (!cartContainer || !csrfToken) return;

    // 1. UPDATE: Tambah fungsi Add untuk mengirimkan price
    document.querySelectorAll(".btn-add-cart").forEach((button) => {
        button.addEventListener("click", function () {
            const id = this.getAttribute("data-id");
            const name = this.getAttribute("data-name");
            const price = this.getAttribute("data-price"); // Ambil harga

            fetch("/cart/add", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({ id: id, name: name, price: price }), // Kirim harga
            })
                .then((response) => response.text())
                .then((html) => {
                    cartContainer.innerHTML = html;
                })
                .catch((error) =>
                    console.error("Error adding to cart:", error),
                );
        });
    });

    // 2. UPDATE: Gunakan Event Delegation pada Cart Container
    // Ini menangani tombol decrease (-) dan Cetak NOTA sekaligus tanpa perlu re-attach event
    cartContainer.addEventListener("click", function (e) {
        // A. Jika yang diklik adalah tombol decrease
        if (e.target.closest(".btn-decrease")) {
            const button = e.target.closest(".btn-decrease");
            const id = button.getAttribute("data-id");

            fetch("/cart/decrease", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({ id: id }),
            })
                .then((response) => response.text())
                .then((html) => {
                    cartContainer.innerHTML = html;
                })
                .catch((error) =>
                    console.error("Error decreasing cart:", error),
                );
        }

        // B. Jika yang diklik adalah tombol Lanjutkan
        if (e.target.closest("#btn-checkout")) {
            fetch("/cart/checkout", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            })
                .then((response) => {
                    if (!response.ok)
                        throw new Error("Terjadi kesalahan jaringan");
                    return response.text();
                })
                .then((html) => {
                    const containerNotifikasi = document.getElementById('container-notifikasi');
                    const sideBar = document.getElementById('sidebar-transaksi');

                    // Cart berhasil disimpan dan dikosongkan dari session,
                    // update tampilan ke mode kosong
                    cartContainer.innerHTML = html;
                    // alert("Transaksi Berhasil Disimpan!"); // Opsional: Beri notifikasi sukses
                    containerNotifikasi.classList.remove('hidden');
                    sideBar.classList.add('-translate-x-full');
                })
                .catch((error) => {
                    console.error("Error checkout:", error);
                    alert("Gagal memproses transaksi.");
                });
        }
    });
});
