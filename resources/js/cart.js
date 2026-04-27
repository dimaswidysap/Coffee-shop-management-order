document.addEventListener("DOMContentLoaded", function () {
    const cartContainer = document.getElementById("cart-container");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

    if (!cartContainer || !csrfToken) return;

    // Fungsi untuk menambah item
    document.querySelectorAll(".btn-add-cart").forEach((button) => {
        button.addEventListener("click", function () {
            const id = this.getAttribute("data-id");
            const name = this.getAttribute("data-name");

            fetch("/cart/add", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({ id: id, name: name }),
            })
                .then((response) => response.text())
                .then((html) => {
                    cartContainer.innerHTML = html; // Update tampilan HTML cart
                    attachDecreaseEvent(); // Pasang kembali event listener untuk tombol kurang yang baru dirender
                })
                .catch((error) =>
                    console.error("Error adding to cart:", error),
                );
        });
    });

    // Fungsi untuk mengurangi item (harus bisa dipanggil ulang setelah render)
    function attachDecreaseEvent() {
        document.querySelectorAll(".btn-decrease").forEach((button) => {
            button.addEventListener("click", function () {
                const id = this.getAttribute("data-id");

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
                        cartContainer.innerHTML = html; // Update tampilan HTML cart
                        attachDecreaseEvent();
                    })
                    .catch((error) =>
                        console.error("Error decreasing cart:", error),
                    );
            });
        });
    }

    // Jalankan event decrease pertama kali saat halaman dimuat
    attachDecreaseEvent();
});
