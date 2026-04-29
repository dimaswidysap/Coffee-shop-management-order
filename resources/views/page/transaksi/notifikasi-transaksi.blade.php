<section id='container-notifikasi' class="fixed h-screen w-full bg-foreground/10 backdrop-blur inset-0 z-20 hidden">
    <section class='w-full h-screen flex justify-center items-center'>
        <div class="w-[90%] md:w-[50%] bg-background-second shadow-2xl rounded-md p-6 flex flex-col gap-4">

            <h2 class="text-foreground font-black text-xl text-center">Transaksi Berhasil!</h2>

            <div class="flex flex-col gap-2 bg-background rounded-md p-4">
                <div class="flex justify-between text-foreground">
                    <span>Total Belanja</span>
                    <span id="notif-total" class="font-bold">-</span>
                </div>
                <div class="flex justify-between text-foreground">
                    <span>Uang Pelanggan</span>
                    <span id="notif-uang" class="font-bold">-</span>
                </div>
                <hr class="border-foreground/20">
                <div class="flex justify-between text-foreground text-lg">
                    <span class="font-bold">Kembalian</span>
                    <span id="notif-kembalian" class="font-black text-green-400">-</span>
                </div>
            </div>

            <button id="btn-tutup-notifikasi"
                class="w-full bg-background rounded-md py-2 font-bold text-foreground! cursor-pointer hover:opacity-80">
                Transaksi Baru
            </button>
        </div>
    </section>
</section>
