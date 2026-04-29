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
            const price = this.getAttribute("data-price");
            const uangPelanggan = this.getAttribute("data-uang-pelanggan");

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

        // Di dalam: cartContainer.addEventListener("click", function (e) { ...

        if (e.target.closest("#btn-checkout")) {

            // Ambil uang pelanggan dari input
            const uangPelangganInput = document.getElementById("uang_pelanggan");
            const totalEl = document.getElementById("total-harga");

            const uangPelanggan = parseInt(uangPelangganInput?.value || 0);
            const total = parseInt(totalEl?.getAttribute("data-total") || 0);

            if (uangPelanggan < total) {
                alert("Uang pelanggan kurang dari total belanja!");
                return;
            }

            fetch("/cart/checkout", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                // Kirim uang_pelanggan ke controller
                body: JSON.stringify({ uang_pelanggan: uangPelanggan }),
            })
                .then((response) => {
                    if (!response.ok) throw new Error("Terjadi kesalahan jaringan");
                    return response.text();
                })
                .then((html) => {
                    const containerNotifikasi = document.getElementById("container-notifikasi");
                    const sideBar = document.getElementById("sidebar-transaksi");

                    // Isi notifikasi dengan data kembalian
                    const kembalian = uangPelanggan - total;
                    document.getElementById("notif-total").textContent =
                        "Rp " + total.toLocaleString("id-ID");
                    document.getElementById("notif-uang").textContent =
                        "Rp " + uangPelanggan.toLocaleString("id-ID");
                    document.getElementById("notif-kembalian").textContent =
                        "Rp " + kembalian.toLocaleString("id-ID");

                    cartContainer.innerHTML = html;
                    containerNotifikasi.classList.remove("hidden");
                    sideBar.classList.add("-translate-x-full");
                })
                .catch((error) => {
                    console.error("Error checkout:", error);
                    alert("Gagal memproses transaksi.");
                });
        }

        // Tombol tutup notifikasi
        document.addEventListener("click", function (e) {
            if (e.target.closest("#btn-tutup-notifikasi")) {
                document.getElementById("container-notifikasi").classList.add("hidden");
            }
        });

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

    });
});
