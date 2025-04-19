<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Edutopia
    </title>
    <!-- Favicon -->
    <link rel="icon" href="assets/edu.png">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
        }

        .mont {
            font-family: "Montserrat", sans-serif;
        }

        .font-quicksand {
            font-family: "Quicksand", sans-serif;
        }

    </style>
</head>

<body class="bg-white text-gray-800">
    <!-- Navbar -->
    <header id="navbar"
        class="lg:px-16 px-4 bg-white flex items-center justify-between py-6 border-b border-[#F4F4F4] flex-wrap transition-all duration-300 z-50">

        <div class="flex items-center w-full md:w-auto mb-4 md:mb-0 justify-between">
            <div class="flex items-center">
                <img src="assets/logo horizontal.svg" alt="">
            </div>

            <label for="menu-toggle" class="cursor-pointer md:hidden block ml-auto">
                <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 20 20">
                    <title>menu</title>
                    <path id="hamburger" d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    <path id="close" class="hidden" d="M4 4l12 12M16 4l-12 12" stroke="black" stroke-width="2"></path>
                </svg>
            </label>
        </div>

        <nav class="hidden md:flex space-x-10 text-sm text-[#1a1a1a]">
            <a class="font-semibold hover:text-[#6DE1D2]" href="#fitur">Fitur</a>
            <a class="font-semibold hover:text-[#6DE1D2]" href="#tutorial">Tutorial</a>
            <a class="font-semibold hover:text-[#6DE1D2]" href="#tentang">Tentang Kami</a>
        </nav>

        <a href=""
            class="hidden md:block px-4 py-3 bg-[#6DE1D2] text-[#000000] rounded-full font-semibold transition duration-300 text-sm  hover:bg-[rgba(109,225,210,0.6)] transition duration-300"
            id="installBtn">
            Download Aplikasi
        </a>

        <input class="hidden" type="checkbox" id="menu-toggle" />
        <div class="md:hidden w-full mt-4 hidden" id="menu">
            <nav class="flex flex-col space-y-2 text-sm">
                <a class="font-semibold text-[#1a1a1a] hover:text-[#6DE1D2]" href="#fitur">Fitur</a>
                <a class="font-semibold text-[#1a1a1a] hover:text-[#6DE1D2]" href="#skill">Tutorial</a>
                <a class="font-semibold text-[#1a1a1a] hover:text-[#6DE1D2]" href="#tentang">Tentang Kami</a>
                <a href=""
                    class="mt-2 px-4 py-3 bg-[#6DE1D2] hover:bg-[rgba(109,225,210,0.6)] text-[#1a1a1a] rounded-full font-medium transition duration-300 text-sm">
                    Download Aplikasi
                </a>
            </nav>
        </div>
    </header>

    <!-- home -->
    <section id="home">
        <main class="flex flex-col-reverse lg:flex-row items-center justify-between px-3 lg:px-20 py-12 lg:py-22 mb-12">
            <div class="lg:w-1/2">
                <h1 class="text-4xl lg:text-5xl font-semibold text-black pt-6">
                    Cerdas Bersama <br>
                    <span class="mt-4 mb-4 inline-block">Edutopia</span>
                </h1>
                <p class="mt-4 text-[#000000] font-normal leading-relaxed">
                    Belajar jadi lebih seru dan mudah bersama Edutopia! <br> Temukan materi SD, SMP, hingga SMA dalam
                    satu
                    aplikasi <br> yang interaktif dan menyenangkan
                </p>
                <div class="mt-6 flex space-x-4">
                    <a class="px-6 py-2 bg-[#6DE1D2] text-[#000000] rounded-full font-medium transition duration-300 hover:bg-[rgba(109,225,210,0.6)]"
                        href="">
                        Mulai
                    </a>
                </div>
            </div>
            <div class="lg:w-1/2 flex justify-center lg:justify-end relative">
                <img alt="menyusul" class="relative z-10" height="410" src="assets/nyusul.svg" width="410" />
            </div>
        </main>
    </section>

    <!-- fitur -->
    <section id="fitur">
        <div class="w-full bg-[#6DE1D2] lg:px-20 px-6 py-10">
            <h1 class="text-[#000000] text-3xl text-center md:text-3xl font-semibold mt-4">Kenapa Pilih EduTopia? </h1>
            <p class="text-[#000000] font-medium mt-4 text-sm text-center">
                Terdapat beberapa fitur unggulan yang dapat mendukung fokus belajar
            </p><br><br>
            <div class="w-full grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-md">
                    <div class="w-20 h-20 bg-[#FFD63A] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="assets/icon-Progresstracking.svg" alt="Progress" class="w-15 h-15">
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Progress Tracking</h3>
                    <p class="text-sm text-[#000000]">Ketahui progress belajarmu setiap minggunya!</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-md">
                    <div class="w-20 h-20 bg-[#F75A5A] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="assets/Icon-play.svg" alt="Video" class="w-18 h-18">
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Belajar dengan Video</h3>
                    <p class="text-sm text-[#000000]">Belajar menggunakan video, membuat pengalaman belajar semakin
                        menyenangkan</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-md">
                    <div class="w-20 h-20 bg-[#FFA955] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="assets/icon-book.svg" alt="Latihan" class="w-16 h-16">
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Latihan Soal</h3>
                    <p class="text-sm text-[#000000]">Uji kemampuanmu dengan latihan soal</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-md">
                    <div class="w-20 h-20 bg-[#FFA955] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="assets/icon-focus.svg" alt="Fokus" class="w-12 h-12">
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Mode Fokus</h3>
                    <p class="text-sm text-[#000000]">Belajar lebih efektif dengan mode fokus</p>
                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-md">
                    <div class="w-20 h-20 bg-[#FFD63A] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="assets/icon-discuss.svg" alt="Forum" class="w-11 h-11">
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Forum Diskusi</h3>
                    <p class="text-sm text-[#000000]">Jadikan pengalaman belajarmu menjadi lebih asik bersama teman!</p>
                </div>

                <!-- Card 6 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-md">
                    <div class="w-20 h-20 bg-[#F75A5A] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="assets/icon-grup.svg" alt="Teman" class="w-15 h-15">
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Cari Teman Baru</h3>
                    <p class="text-sm text-[#000000]">Temukan teman belajar</p>
                </div>

            </div>
        </div>
    </section>

    <!-- tutorial -->
    <section id="tutorial" class="career container py-12 mt-18">
        <div class="flex flex-col w-full mb-20">
            <h1 class="text-[#000000] text-3xl text-center md:text-3xl font-semibold mt-4">Cara Belajar di EduTopia
            </h1>
            <p class="text-[#000000] font-medium mt-4 text-base text-center">
                Terdapat beberapa fitur unggulan yang dapat mendukung fokus belajar
            </p>
        </div>
        <br>

        <!-- card 1 -->
        <div class="max-w-6xl mx-auto px-12">
            <div class="flex flex-wrap items-center justify-between mb-16">
                <div class="w-full md:w-1/2 flex items-center justify-center">
                    <div class="text-left px-4">
                        <h3 class="text-2xl text-[#000000] font-semibold">Pilih Kelas Anda </h3>
                        <p class="text-[#000000] mt-4 font-normal max-w-md">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua</p>
                    </div>
                </div>

                <div class="w-full md:w-1/2 flex justify-end md:justify-center mb-6 md:mb-0">
                    <div class="relative w-90 h-48 bg-gray-800 rounded-3xl">
                        <!-- Badge bulat -->
                        <div
                            class="absolute -top-4 -right-4 bg-orange-300 w-14 h-16 rounded-full flex items-center justify-center">
                            <span class="text-black text-2xl font-semibold">1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card 2 -->
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap items-center justify-between mb-16">
                <div class="w-full md:w-1/2 flex justify-center md:justify-center mb-6 md:mb-0">
                    <div class="relative w-90 h-48 bg-gray-800 rounded-3xl">
                        <!-- Badge bulat -->
                        <div
                            class="absolute -top-4 -right-4 bg-orange-300 w-14 h-16 rounded-full flex items-center justify-center">
                            <span class="text-black text-2xl font-semibold">2</span>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 flex items-center">
                    <div class="text-left px-4">
                        <h3 class="text-2xl text-[#000000] font-semibold">Pilih Kelas Anda </h3>
                        <p class="text-[#000000] mt-4 font-normal max-w-md">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua</p>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br>

        <!-- card 3 -->
        <div class="max-w-6xl mx-auto px-12">
            <div class="flex flex-wrap items-center justify-between mb-16">
                <div class="w-full md:w-1/2 flex items-center justify-center">
                    <div class="text-left px-4">
                        <h3 class="text-2xl text-[#000000] font-semibold">Pilih Kelas Anda </h3>
                        <p class="text-[#000000] mt-4 font-normal max-w-md">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua</p>
                    </div>
                </div>

                <div class="w-full md:w-1/2 flex justify-center md:justify-center mb-6 md:mb-0">
                    <div class="relative w-90 h-48 bg-gray-800 rounded-3xl">
                        <!-- Badge bulat -->
                        <div
                            class="absolute -top-4 -right-4 bg-orange-300 w-14 h-16 rounded-full flex items-center justify-center">
                            <span class="text-black text-2xl font-semibold">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- tentang kami -->
    <section id="tentang">
        <div class="py-22 px-24">
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between">

                <!-- Kolom Kiri -->
                <div class="text-black">
                    <img src="assets/logo horizontal2.svg" alt="Edutopia Logo" class="-mt-2 mb-7 w-40 sm:w-48 md:w-50">
                    <ul class="space-y-2">
                        <li class="font-medium"><a href="#" class="hover:underline">About Us</a></li>
                        <li class="font-medium"><a href="#" class="hover:underline">Our Team</a></li>
                        <li class="font-medium"><a href="#" class="hover:underline">Careers</a></li>
                        <li class="font-medium"><a href="#" class="hover:underline">Press Kit</a></li>
                    </ul>
                </div>

                <!-- Kolom Tengah -->
                <div class="text-black">
                    <h3 class="text-lg font-semibold mb-8 mt-4">Features</h3>
                    <ul class="space-y-2">
                        <li class="font-medium"><a href="#" class="hover:underline">Watch Edu Video</a></li>
                        <li class="font-medium"><a href="#" class="hover:underline">Article</a></li>
                        <li class="font-medium"><a href="#" class="hover:underline">Focus Time</a></li>
                        <li class="font-medium"><a href="#" class="hover:underline">Forum Discussion</a></li>
                    </ul>
                </div>

                <!-- Kolom Kanan -->
                <div class="text-black">
                    <h3 class="text-lg font-semibold mb-8 mt-3">Resources</h3>
                    <ul class="space-y-2">
                        <li class="font-medium"><a href="#" class="hover:underline">Help Center</a></li>
                        <li class="font-medium"><a href="#" class="hover:underline">Dashboard</a></li>
                        <li class="font-medium"><a href="#" class="hover:underline">Tutorials</a></li>
                        <li class="font-medium"><a href="#" class="hover:underline">Community</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </section>



    <!-- footer -->
    <footer>
        <hr class="text-[#E5E5E5]">
        <p class="text-center py-5 text-[#6A6A6A] font-quicksand font-medium text-lg">© 2025 Edutopia. All rights
            reserved.</p>
    </footer>

    <!-- js -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // scroll effect
            let lastScrollTop = 0;
            const navbar = document.getElementById("navbar");

            window.addEventListener("scroll", function () {
                let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                if (currentScroll > lastScrollTop && currentScroll > 80) {
                    navbar.classList.add("fixed", "top-0", "left-0", "w-full", "shadow-md", "bg-white");
                } else if (currentScroll <= 80) {
                    navbar.classList.remove("fixed", "top-0", "left-0", "w-full", "shadow-md",
                        "bg-white");
                }

                lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
            });

            const menuToggle = document.getElementById("menu-toggle");
            const menu = document.getElementById("menu");
            const hamburgerIcon = document.getElementById("hamburger");
            const closeIcon = document.getElementById("close");

            menuToggle.addEventListener("change", function () {
                if (menuToggle.checked) {
                    menu.classList.remove("hidden");
                    hamburgerIcon.classList.add("hidden");
                    closeIcon.classList.remove("hidden");
                } else {
                    menu.classList.add("hidden");
                    hamburgerIcon.classList.remove("hidden");
                    closeIcon.classList.add("hidden");
                }
            });
        });

    </script>
</body>

</html>
