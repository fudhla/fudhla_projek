<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Favicon -->
<link rel="icon" type="image/png" href="./assets/images/favicon.png">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMD/CDQ5P7sU+Vl+Z/tS2Q6uFwJvU5c4a7g5c5a0l8F1I4pY4q1wz4g0I7sD9yQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap Icons (Bisa dihapus jika hanya Font Awesome yang digunakan) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            background-image: url('./assets/images/banner-img1.png');
            background-size: cover;
            background-position: center;
        }

        .hero-overlay {
            background-color: rgba(0, 45, 100, 0.65);
        }

        .nav-link:hover {
            color: #facc15;
        }

        /* SOLUSI FAB WHATSAPP (Tombol yang Hilang) */
        .fab-whatsapp {
            position: fixed;
            bottom: 20px;
            /* Jarak dari bawah */
            right: 20px;
            /* Jarak dari kanan */
            width: 50px;
            /* Ukuran tombol */
            height: 50px;
            background-color: #25D366;
            /* Warna hijau WhatsApp */
            color: white;
            border-radius: 50%;
            /* Bentuk lingkaran */
            text-align: center;
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.4);
            display: flex;
            /* Untuk memusatkan ikon */
            align-items: center;
            justify-content: center;
            font-size: 24px;
            /* Ukuran ikon */
            z-index: 1000;
            /* Pastikan tombol di atas elemen lain */
            transition: transform 0.3s ease;
        }

        .fab-whatsapp:hover {
            transform: scale(1.1);
            /* Efek saat disentuh kursor */
        }
    </style>
</head>

<body class="text-gray-800">
