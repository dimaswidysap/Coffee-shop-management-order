<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GorengKu POS &mdash; Sistem Kasir Ayam Goreng</title>
    @vite(['resources/css/app.css', 'resources/css/colors.css', 'resources/css/table.css'])
    <style>


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --cream: #FAF7F2;
            --warm-white: #FFFDF9;
            --charcoal: #1C1A17;
            --brown: #6B4C2A;
            --amber: #C17E3C;
            --amber-light: #E8A95A;
            --amber-pale: #F5E6CB;
            --gray-mid: #8C8478;
            --gray-light: #EDE8E0;
        }

        body {


            min-height: 100vh;
            overflow-x: hidden;
        }



        /* Noise texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.4;
        }

        /* Animated flame icon */
        @keyframes flicker {

            0%,
            100% {
                transform: scaleY(1) rotate(-1deg);
            }

            25% {
                transform: scaleY(1.05) rotate(1deg);
            }

            75% {
                transform: scaleY(0.97) rotate(-0.5deg);
            }
        }

        .flame {
            animation: flicker 2.5s ease-in-out infinite;
            transform-origin: bottom center;
            display: inline-block;
        }

        /* Fade in animations */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.7s ease forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.9s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
            opacity: 0;
        }

        .delay-2 {
            animation-delay: 0.25s;
            opacity: 0;
        }

        .delay-3 {
            animation-delay: 0.4s;
            opacity: 0;
        }

        .delay-4 {
            animation-delay: 0.55s;
            opacity: 0;
        }

        .delay-5 {
            animation-delay: 0.7s;
            opacity: 0;
        }

        /* Divider line */
        .divider {
            width: 40px;
            height: 1.5px;
            background: var(--amber);
            display: block;
        }

        /* Buttons */
        .btn-primary {
            background-color:#181c23 !important;
            color: var(--warm-white);
            border: 1.5px solid var(--charcoal);
            padding: 14px 36px;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            inset: 0;
            background: oklch(50.5% 0.213 27.518);
            transform: translateX(-101%);
            transition: transform 0.3s ease;
            z-index: 0;
        }

        .btn-primary:hover::after {
            transform: translateX(0);
        }

        .btn-primary span,
        .btn-primary svg {
            position: relative;
            z-index: 1;
        }



        .btn-outline {
            background-color: transparent;
            color: var(--charcoal);
            border: 1.5px solid var(--charcoal);
            padding: 14px 36px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
        }

        .btn-outline:hover {
            background-color: var(--charcoal);
            color: var(--warm-white);
        }

        /* Feature card */
        .feature-card {
            background: #b6b6b6;
            border: 1px solid var(--gray-light);
            padding: 32px 28px;
            transition: border-color 0.2s ease, transform 0.2s ease;
        }

        .feature-card:hover {

            transform: translateY(-3px);
        }

        .feature-icon {
            width: 44px;
            height: 44px;
            background: #b6b6b6;
            display: flex;

            box-shadow: 2px 2px 20px black;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        /* Decorative elements */
        .deco-circle {
            position: absolute;
            border-radius: 50%;
            background: var(--amber-pale);
            opacity: 0.5;
        }

        /* Navigation */
        nav {
            position: relative;
            z-index: 10;
            border-bottom: 1px solid var(--gray-light);
            background: rgba(250, 247, 242, 0.85);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        /* Hero section */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--amber-pale);
            border: 1px solid rgba(193, 126, 60, 0.3);
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--brown);
        }

        .big-number {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(80px, 14vw, 160px);
            line-height: 0.9;
            color: var(--amber-pale);
            user-select: none;
            pointer-events: none;
        }

        /* Stats */
        .stat-item {
            padding: 24px 0;
            border-top: 1px solid var(--gray-light);
        }

        .stat-item:last-child {
            border-bottom: 1px solid var(--gray-light);
        }

        /* Scroll indicator */
        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(6px);
            }
        }

        .scroll-indicator {
            animation: bounce 1.8s ease-in-out infinite;
        }

        /* Section label */
        .section-label {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--amber);
        }
    </style>
</head>

<body class="bg-background-second!">

    {{-- NAVIGATION --}}
    <nav class="absolute top-0 flex w-full justify-center bg-background!">
        <div class="w-full max-w-7xl mx-auto px-6 py-4 flex items-center justify-between m-auto ">
            <div class="flex items-center gap-3">
                <div class="flame text-2xl">🍗</div>
                <div>
                    <p class="font-display text-lg leading-none text-foreground"">GorengKu</p>
                    <p class="text-xs text-foreground/50">POINT OF SALE</p>
                </div>
            </div>

            <div class="flex items-center gap-2 sm:gap-3">
                <a href="/menu" class="btn-outline text-xs sm:text-sm px-4 sm:px-6 py-2 sm:py-3 text-foreground!"
                    style="padding: 10px 20px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M3 6h18M3 12h18M3 18h18" />
                    </svg>
                    <span class="hidden sm:inline">Menu Admin</span>
                    <span class="sm:hidden">Admin</span>
                </a>
                <a href="/transaksi" class="btn-primary text-xs sm:text-sm"
                    style="padding: 10px 20px;">
                    <svg  width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="2" y="5" width="20" height="14" rx="2" />
                        <path d="M2 10h20" />
                    </svg>
                    <span><span class="hidden sm:inline">Kasir</span><span class="sm:hidden">Kasir</span></span>
                </a>
            </div>
        </div>
    </nav>

    {{-- HERO --}}
    <section class="relative overflow-hidden" style="min-height: 90vh; display: flex; align-items: center;">

        {{-- Decorative background number --}}
        <div class="text-foreground/10! big-number absolute right-0 top-1/2 -translate-y-1/2 select-none pointer-events-none pr-4 hidden md:block"
            aria-hidden="true">
            POS
        </div>

        {{-- Deco circles --}}
        <div class="deco-circle bg-foreground/10!" style="width: 320px; height: 320px; top: -80px; left: -120px;"></div>
        <div class="deco-circle bg-foreground/10!" style="width: 180px; height: 180px; bottom: 60px; right: 180px;"></div>

        <div class="max-w-6xl mx-auto px-6 py-20 relative z-10 w-full">
            <div class="max-w-2xl">

                <div class="animate-fade-up delay-1 ">
                    <span class="hero-badge bg-red-700! text-foreground!">
                        <span class="flame">🔥</span>
                        Sistem Kasir Modern
                    </span>
                </div>

                <h1 class="font-display animate-fade-up delay-2 mt-6 text-foreground!"
                    style="font-size: clamp(44px, 7vw, 80px); line-height: 1.05; color: var(--charcoal);">
                    Kelola Warung<br>
                    <span class="text-red-700 font-black">Ayam Goreng</span><br>
                    Lebih Mudah.
                </h1>

                <p class="animate-fade-up delay-3 mt-6 text-base sm:text-lg leading-relaxed text-foreground/30!"
                    style="color: var(--gray-mid); max-width: 480px;">
                    Sistem point of sale sederhana dan cepat. Catat transaksi, kelola menu, dan pantau penjualan
                    harianmu tanpa ribet.
                </p>



                {{-- Stats --}}


            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 scroll-indicator hidden md:block"
            style="color: var(--gray-mid);">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="1.5">
                <path d="M12 5v14M5 12l7 7 7-7" />
            </svg>
        </div>
    </section>

    {{-- DIVIDER --}}
    <div class="bg-red-700!" style="height: 1px;"></div>

    {{-- FITUR --}}
    <section class="py-20 sm:py-28">
        <div class="max-w-6xl mx-auto px-6">

            <div class="mb-14">
                <p class="section-label mb-4 text-foreground!">Fitur Utama</p>
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <h2 class="text-foreground!" class="font-display"
                        style="font-size: clamp(28px, 4vw, 42px); color: var(--charcoal); line-height: 1.15;">
                        Semua yang kamu butuhkan<br>ada di sini.
                    </h2>
                    <p class="text-sm sm:text-base text-foreground/60!" style="color: var(--gray-mid); max-width: 280px;">
                        Dirancang khusus untuk usaha kuliner kecil menengah.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                {{-- Card 1 --}}
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" style="color: var(--brown)">
                            <rect x="2" y="5" width="20" height="14" rx="2" />
                            <path d="M2 10h20" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl mb-2" style="color: var(--charcoal)">Kasir Cepat</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--gray-mid)">Proses transaksi dalam hitungan
                        detik. Pilih menu, hitung total, cetak struk — selesai.</p>
                </div>

                {{-- Card 2 --}}
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" style="color: var(--brown)">
                            <path
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl mb-2" style="color: var(--charcoal)">Kelola Menu</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--gray-mid)">Tambah, ubah, atau hapus item
                        menu kapan saja. Atur harga dan kategori dengan mudah.</p>
                </div>

                {{-- Card 3 --}}
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" style="color: var(--brown)">
                            <path d="M3 3v18h18" />
                            <path d="M18 9l-5 5-3-3-4 4" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl mb-2" style="color: var(--charcoal)">Laporan Penjualan</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--gray-mid)">Pantau omset harian, mingguan,
                        dan bulanan langsung dari dashboard admin.</p>
                </div>

                {{-- Card 4 --}}
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" style="color: var(--brown)">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 6v6l4 2" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl mb-2" style="color: var(--charcoal)">Riwayat Transaksi</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--gray-mid)">Semua riwayat transaksi
                        tersimpan rapi. Lacak setiap penjualan kapan pun kamu butuh.</p>
                </div>

                {{-- Card 5 --}}
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" style="color: var(--brown)">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl mb-2" style="color: var(--charcoal)">Data Aman</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--gray-mid)">Data tersimpan di server Laravel
                        milikmu sendiri. Privasi dan keamanan terjaga penuh.</p>
                </div>

                {{-- Card 6 --}}
                <div class="feature-card" style="background: var(--charcoal); border-color: var(--charcoal);">
                    <div class="feature-icon" style="background: rgba(255,255,255,0.08);">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" style="color: var(--amber-light)">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl mb-2" style="color: var(--warm-white)">Ringan & Cepat</h3>
                    <p class="text-sm leading-relaxed" style="color: rgba(255,255,255,0.5)">Dibangun di atas Laravel &
                        Tailwind CSS. Performa tinggi bahkan di jaringan lambat sekalipun.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- DIVIDER --}}
    <div style="height: 1px; background: var(--gray-light);"></div>

    {{-- CTA --}}


    {{-- FOOTER --}}
    <footer style="border-top: 1px solid var(--gray-light);" class="bg-foreground!">
        <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="flame text-lg">🍗</span>
                <span class="font-display" style="color: var(--charcoal)">GorengKu POS</span>
            </div>
            <p class="text-xs text-center sm:text-right text-background!">
                Dibangun dengan Laravel &amp; Tailwind CSS &middot; &copy; {{ date('Y') }} GorengKu
            </p>
        </div>
    </footer>

</body>

</html>
