<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>PutarPintar</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/logo.svg">
    <!-- Link tailwind -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" /> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    
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
    <header id="navbar" class="lg:px-16 px-4 bg-white flex items-center justify-between py-6 border-b border-[#F4F4F4] flex-wrap transition-all duration-300 z-50">

        <div class="flex items-center w-full md:w-auto mb-4 md:mb-0 justify-between">
          <img src="assets/logo.svg" alt="Logo PutarPintar">
      
          <label for="menu-toggle" class="cursor-pointer md:hidden block ml-auto">
            <!-- Hamburger Menu -->
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
              <title>menu</title>
              <path id="hamburger" d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
              <path id="close" class="hidden" d="M4 4l12 12M16 4l-12 12" stroke="black" stroke-width="2"></path>
            </svg>
          </label>
        </div>
      
        <!-- Bungkus nav dalam div flex-grow -->
        <div class="hidden md:flex flex-grow justify-center">
          <nav class="flex space-x-10 text-sm text-[#1a1a1a]">
            <a class="font-semibold hover:text-[#FAAE2B]" href="#fitur">Fitur</a>
            <a class="font-semibold hover:text-[#FAAE2B]" href="#tutorial">Tutorial</a>
            <a class="font-semibold hover:text-[#FAAE2B]" href="#ulasan">Ulasan Pengguna</a>
            <a class="font-semibold hover:text-[#FAAE2B]" href="#tentang">Tentang Kami</a>
          </nav>
        </div>
      
        <input class="hidden" type="checkbox" id="menu-toggle" />
        <div class="md:hidden w-full mt-4 hidden" id="menu">
          <nav class="flex flex-col space-y-2 text-sm">
            <a class="font-semibold text-[#1a1a1a] hover:text-[#FAAE2B]" href="#fitur">Fitur</a>
            <a class="font-semibold text-[#1a1a1a] hover:text-[#FAAE2B]" href="#skill">Tutorial</a>
            <a class="font-semibold text-[#1a1a1a] hover:text-[#FAAE2B]" href="#tentang">Tentang Kami</a>
          </nav>
        </div>
    </header>
      
    <!-- home -->
    <section id="home" class="relative overflow-hidden">
        <!-- Konten Hero -->
        <main class="relative flex flex-col-reverse lg:flex-row md:flex-col items-center justify-between px-3 lg:px-20 py-12 lg:py-22 z-40 -ml-10">
          <!-- Layer Gelombang 1 -->
          <img src="/assets/icon_gelombang1.svg" alt="Wave 1" 
          class="absolute -top-1 left-0 w-full lg:w-full z-10" />
        
          <!-- Layer Gelombang 2 -->
          <img src="/assets/icon_gelombang2.svg" alt="Wave 2" 
          class="absolute top-2 lg:top-6 left-0 w-full lg:w-full z-20" />
        
          <!-- Layer Gelombang 3 -->
          <img src="/assets/icon_gelombang3.svg" alt="Wave 3" 
          class="absolute top-7 lg:top-14 bottom-14 left-0 w-full lg:w-full z-30" />
          
          <!-- Ilustrasi hp -->
          <img src="/assets/icon_ilustrasi_hp.svg" alt="Lingkaran Biru" 
          class="absolute top-30 lg:top-20 right-8 lg:right-12 w-100 z-40 lg:w-140" />
          
          <!-- Element star 2 -->
          <img src="/assets/icon_element_star2.svg" alt="Lingkaran Biru" 
          class="absolute top-30 lg:top-30 right-5 lg:right-20 w-18 lg:w-15 z-40" />

          <!-- Element lingkaran 2 -->
          <img src="/assets/icon_element_ellipse2.svg" alt="Lingkaran Biru" 
          class="absolute top-55 lg:top-55 right-10 lg:right-15 w-50 lg:w-60 z-30" />

          <!-- Element segitiga -->
          <img src="/assets/icon_element_polygon.svg" alt="Kotak Miring" 
          class="absolute top-98 lg:top-118 left-32 lg:left-210 w-18 lg:w-25 z-40" />

          <!-- Element lingkaran 1 -->
          <img src="/assets/icon_element_ellipse1.svg" alt="Segitiga Hijau" 
          class="absolute top-58 lg:top-65 left-30 lg:left-205 w-10 lg:w-10 z-30" />

          <!-- Element rectangle -->
          <img src="/assets/icon_element_rectangle.svg" alt="Lingkaran Kuning" 
          class="absolute top-48 left-18 lg:left-190 w-12 lg:w-10 z-40" />

          <!-- Element star 1 -->
          <img src="/assets/icon_element_star1.svg" alt="Bintang" 
          class="absolute top-15 lg:top-35 left-15 lg:left-20 w-8 lg:w-10 z-40" />

          <div class="lg:w-1/2 mt-96 lg:mt-0 z-70">
            <h1 class="text-4xl lg:text-5xl font-semibold text-[#0A0A0A] pt-25 pl-20">
              Cerdas Bersama <br>
              <span class="mt-4 mb-4 inline-block">PutarPintar</span>
            </h1>
            <p class="mt-8 text-[#0A0A0A] font-quicksand leading-[1.5] lg:leading-[2.5] pl-20">
              Belajar jadi lebih seru dan mudah bersama PutarPintar! <br> Temukan materi SD, SMP, hingga SMA dalam
              satu aplikasi <br> yang interaktif dan menyenangkan
            </p>
            <div class="button mt-7 flex space-x-4 ml-20">
              <a class="px-6 py-2 bg-[#E9365B] text-[#FFFFFF] rounded-full font-semibold transition duration-300 hover:bg-pink-400  transition duration-300"
                  href="https://drive.google.com/uc?export=download&id=11FZs7Ytbj0O4-HTAwmyMghd7w9UhlcJs">
                  Download Aplikasi
              </a>
            </div>
          </div>
        </main>     
    </section>      

    <!-- fitur -->
    <section id="fitur">
        <div class="w-full lg:px-20 px-6 py-10"> <!--bg-[#6DE1D2]-->
            <h1 class="text-[#000000] text-3xl md:text-3xl font-semibold font-quicksand text-center mt-15">
                Kenapa Pilih <span class="relative inline-block">PutarPintar?
                  <!-- Element garis -->
                  <img src="/assets/icon_element_garis.svg" alt="" 
                       class="absolute -right-8 -top-6 w-10 h-10 md:w-12 md:h-12" />
                </span>
            </h1>
            
            <p class="text-[#000000] font-medium mt-4 text-sm text-center">
                Terdapat beberapa fitur unggulan yang dapat mendukung fokus belajar
            </p>
            <br><br>
            <div class="w-full grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-15 mt-5">
                <!-- Card 1 -->
                <div class="p-6 text-center">
                    <div class="w-20 h-20 bg-[#FA5246] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="assets/icon_timer.svg" alt="Progress" class="w-12 h-12">
                    </div>
                    <h3 class="text-lg font-semibold mb-1 font-quicksand">Mode Fokus</h3>
                    <p class="text-sm text-[#000000]">Belajar lebih efektif dengan mode fokus</p>
                </div>

                <!-- Card 2 -->
                <div class="p-6 text-center"> <!--bg-white rounded-2xl-->
                    <div class="w-20 h-20 bg-[#FAAE2B] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="assets/icon_play.svg" alt="Video" class="w-12 h-12">
                    </div>
                    <h3 class="text-lg font-semibold mb-1 font-quicksand">Belajar dengan Video</h3>
                    <p class="text-sm text-[#000000]">Belajar menggunakan video, membuat <br> pengalaman belajar semakin
                        menyenangkan</p>
                </div>

                <!-- Card 3 -->
                <div class="p-6 text-center">
                    <div class="w-20 h-20 bg-[#FA5246] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="assets/icon_group.svg" alt="Latihan" class="w-16 h-16">
                    </div>
                    <h3 class="text-lg font-semibold mb-1 font-quicksand">Cari Teman Baru</h3>
                    <p class="text-sm text-[#000000]">Temukan teman belajar</p>
                </div>
            </div>
        </div>
    </section>

    <!-- tutorial -->
    <section id="tutorial" class="career py-12 w-full">
      <div class="flex flex-col w-full mb-20 mt-16 px-4 lg:px-20">
        <h1 class="text-[#000000] text-3xl text-center font-semibold font-quicksand">
          Cara Belajar di PutarPintar
        </h1>
        <p class="text-[#000000] font-medium mt-4 text-base text-center">
          Terdapat beberapa fitur unggulan yang dapat mendukung fokus belajar
        </p>
      </div>
    
      <!-- card 1 -->
      <div class="max-w-6xl mx-auto px-4 lg:px-20">
        <div class="flex flex-col-reverse md:flex-row flex-wrap items-center justify-center md:justify-between gap-y- mb-16">
          <div class="w-full md:w-1/2 flex justify-center">
            <div class="text-left md:text-left text-center px-4 max-w-md">
              <h3 class="text-2xl text-[#000000] font-semibold">Mulai dari kenalan dulu yuk!</h3>
              <p class="text-[#000000] mt-4 font-normal">
                Isi nama dan informasi dasar kamu supaya pengalaman belajarnya lebih personal dan sesuai kebutuhanmu. Tenang, datamu aman kok!
              </p>
            </div>
          </div>
          <div class="w-full md:w-1/2 flex justify-center">
            <div class="relative w-full max-w-md h-48 bg-[#FFF3E0] rounded-3xl">
              <div class="absolute -bottom-1 left-1/3 w-32 h-48">
                <img src="assets/icon_ilustrasi1.svg" alt="" class="w-full h-full object-contain">
              </div>
              <div class="absolute -top-6 lg:-top-8 left-80 lg:left-95 w-14 h-14 relative flex items-center justify-center">
                <img src="assets/icon_blob.svg" alt="" class="w-full h-full">
                <span class="absolute inset-0 flex items-center justify-center text-black text-2xl font-semibold">1</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <!-- card 2 -->
      <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row flex-wrap items-center justify-center md:justify-between gap-y-12 mb-16">
          <div class="w-full md:w-1/2 flex justify-center">
            <div class="relative w-full max-w-md h-48 rounded-3xl z-10">
              <div class="absolute -top-10 lg:-top-12 -left-10 w-28 lg:w-30 h-28 lg:h-30 bg-[url('/assets/icon_pattern.svg')] bg-repeat z-0"></div>
                <div class="w-full h-full bg-[#E3F2FD] rounded-3xl z-2 relative">
                  <div class="absolute top-3 lg:top-[2px] left-1/3 w-32 h-48 z-10">
                    <img src="assets/icon_ilustrasi2.svg" alt="" class="w-full h-full object-contain" />
                  </div>
                  <div class="absolute -top-6 lg:-top-8 left-4 lg:left-2 w-14 h-14 relative flex items-center justify-center z-10">
                    <img src="assets/icon_blob.svg" alt="" class="w-full h-full" />
                    <span class="absolute inset-0 flex items-center justify-center text-black text-2xl font-semibold">2</span>
                  </div>
                </div>
            </div>
          </div>
          <div class="w-full md:w-1/2 flex justify-center">
            <div class="text-left md:text-left text-center px-4 max-w-md">
              <h3 class="text-2xl text-[#000000] font-semibold">Pilih Kelas Sesuai Level Kamu</h3>
              <p class="text-[#000000] mt-4 font-normal">
                Mau SD, SMP, atau SMA? Pilih jenjang kelas yang kamu ikuti sekarang, dan PutarPintar akan menyiapkan materi belajar yang paling pas untukmu
              </p>
            </div>
          </div>
        </div>
      </div>
    
      <!-- card 3 -->
      <div class="max-w-6xl mx-auto px-4 lg:px-12">
        <div class="flex flex-col-reverse md:flex-row flex-wrap items-center justify-center md:justify-between gap-y-12 mb-16">
          <div class="w-full md:w-1/2 flex justify-center">
            <div class="text-left md:text-left text-center px-4 max-w-md">
              <h3 class="text-2xl text-[#000000] font-semibold">Siap Belajar? Yuk, Pilih Materinya!</h3>
              <p class="text-[#000000] mt-4 font-normal">
                Tinggal klik materi yang kamu mau. Belajarnya bebas, sesuai gaya dan waktu kamu sendiri!
              </p>
            </div>
          </div>
          <div class="w-full md:w-1/2 flex justify-center">
            <div class="relative w-full max-w-md h-48 bg-[#FCE4EC] rounded-3xl">
              <div class="absolute -bottom-1 left-1/3 w-32 h-48">
                <img src="assets/icon_ilustrasi3.svg" alt="" class="w-full h-full object-contain">
              </div>
              <div class="absolute -top-6 lg:-top-8 left-80 lg:left-95 w-14 h-14 relative flex items-center justify-center">
                <img src="assets/icon_blob.svg" alt="" class="w-full h-full">
                <span class="absolute inset-0 flex items-center justify-center text-black text-2xl font-semibold">3</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    
    
     <!-- ulasan -->
    <section id="ulasan" class="bg-white py-12">
      <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8 font-quicksand">Mereka sudah merasakannya. Sekarang giliran kamu!</h1>
        <p class="text-[#000000] font-medium mb-10 lg:mt-[4px] text-base text-center">Lihat apa kata para pelajar dan orang tua yang udah nyobain PutarPintar!</p>
        
        <div class="relative overflow-hidden">
          <!-- Track / Slide Container -->
          <div id="carousel-track" class="flex transition-transform duration-500 ease-in-out">
           @foreach($ulasan as $testi)
          <div class="testimonial-card shrink-0 min-h-[15rem] max-w-sm w-full mx-4 rounded-lg p-6 shadow-md text-left transition-all duration-300 bg-white flex flex-col justify-between">
              <img src="/assets/icon_card_ulasan.svg" alt="User" class="w-20 h-20 mx-auto -mt-6">
              <h1 class="mt-2 text-neutral-950 text-xl font-semibold">{{$testi->user->name}}</h1>
              <p class="text-neutral-950 text-sm font-medium mt-1">{{$testi->user->email}}</p>
              <p class="text-left mt-4 break-words">{{ \Illuminate\Support\Str::limit($testi->deskripsi, 150) }}</p>
          </div>
          @endforeach

          </div>
        </div>
        <!-- button -->
        <div class="flex justify-center mt-10 lg:mt-[20px]">
          <a href="/testimoni"
             class="bg-[#FAAE2B] text-black font-semibold px-15 py-3  rounded-full shadow-md hover:bg-yellow-400 transition duration-300 inline-flex items-center gap-2">
            <span>Lihat semua testimoni</span>
            <img src="/assets/icon-arrow-right.svg" alt="Panah" class="w-4 h-4">
          </a>
        </div>                
      </div>
    </section>      
           
    <!-- about -->
    <section id="tentang" class="bg-[#FAAE2B]py-35">
        <!-- Kotak isi -->
        <div class="bg-[url('/assets/bg_ulasan.svg')] bg-cover bg-center rounded-[97px] p-8 max-w-5xl mx-auto mt-15 mb-15">
          <h2 class="text-neutral-950 text-3xl font-bold text-center mb-4 mt-16">Kenalan Yuk!</h2>
          <p class="text-neutral-950 text-center mb-8">Lihat apa kata para pelajar dan orang tua yang udah nyobain PutarPintar!</p>
      
          <div class="grid md:grid-cols-2 gap-4 mt-20 px-20">
            <!-- Accordion Item Kiri -->
            <div class="flex flex-col border-b border-neutral-950 mb-6 mr-4"> <!-- margin-bottom ditambahkan -->
              <button class="flex justify-between items-center w-full py-4 text-neutral-950 font-semibold" onclick="toggleAccordion(0)">
                Bedanya PutarPintar dengan yang lain?
                <span class="ml-2 flex-shrink-0 translate-y-[1px]">
                  <svg id="icon-0" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </button>
              <div id="content-0" class="max-h-0 overflow-hidden transition-all duration-300 text-neutral-950 text-sm mb-4">
                <p class="pb-4">
                  PutarPintar bukan sejadar aplikasi belajar bahasa. Kami hadir dengan pendekatan yang lebih menyenangkan, 
                  interaktis, dan relevan dengan kehidupan sehari-hari. Dibandingkan dengan apilkasi lain yang fokus pada 
                  hafalan dan tata bahasa, PutarPintar mengajak pengguna untuk belajar lewat permainan, percakapan nyata, dan 
                  tantangan harian yang bikin semangat terus belajar.
                </p>
              </div>
            </div>
          
            <!-- Accordion Item Kanan -->
            <div class="flex flex-col border-b border-neutral-950 mb-6 ml-0 lg:ml-6"> <!-- margin-bottom ditambahkan -->
              <button class="flex justify-between items-start w-full py-4 text-neutral-950 font-semibold text-left" onclick="toggleAccordion(1)">
                <span class="flex-1">
                  Kalau belajar pakai vieo, kenapa harus lewat aplikasi PutaPintar?
                </span>
                <svg id="icon-1" class="w-5 h-5 mt-1 ml-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              <div id="content-1" class="max-h-0 overflow-hidden transition-all duration-300 text-neutral-950 text-sm">
                <p class="pb-4">
                  Karena PutarPintar menyediakan fitur-fitur khusus untuk meningkatkan efektivitas belajar lewat video.
                </p>
              </div>
            </div>            
          
            <!-- Accordion Item -->
            <div class="flex flex-col border-b border-neutral-950 mb-20 mr-4"> <!-- margin-bottom lebih besar -->
              <button class="flex justify-between items-center w-full py-4 text-neutral-950 font-semibold" onclick="toggleAccordion(2)">
                Apa itu mode fokus di aplikasi PutarPintar
                <span class="ml-2 flex-shrink-0 translate-y-[1px]">
                  <svg id="icon-2" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
              </button>
              <div id="content-2" class="max-h-0 overflow-hidden transition-all duration-300 text-neutral-950 text-sm">
                <p class="pb-4">
                  Mode Fokus membantu meminimalisir distraksi saat belajar supaya lebih konsentrasi.
                </p>
              </div>
            </div>
          </div>         
        </div>
    </section>

    <!-- footer -->
    <footer class="relative bg-white pt-15 pb-5">
        <div class="flex flex-col items-center md:w-1/2 lg:w-full">
          <!-- Logo -->
           <img src="assets/logo.svg" alt="">
          <!-- <h1 class="text-3xl font-bold font-quicksand">
            <span class="text-cyan-400">Putar</span><span class="text-yellow-400">Pintar</span>
          </h1> -->
    
          <!--  -->

          <!-- Social Media Icons -->
          <div class="flex space-x-5 mt-10 mb-20">
            {{-- <a href="#" class="bg-[#E9365BE5] w-13 h-13 flex items-center justify-center rounded-full">
              <i class="fab fa-youtube text-white text-2xl"></i>
            </a> --}}
            <a href="#" class="bg-[#00D4CD] w-13 h-13 flex items-center justify-center rounded-full">
              <i class="fab fa-facebook-f text-white text-2xl"></i>
            </a>            
            <a href="#" class="bg-[#FAAE2BCC] w-13 h-13 flex items-center justify-center rounded-full">
              <i class="fab fa-instagram text-white text-2xl"></i>
            </a>
            {{-- <a href="#" class="bg-[#E9365BE5] w-13 h-13 flex items-center justify-center rounded-full">
              <i class="fab fa-x-twitter text-white text-2xl"></i>
            </a>
            <a href="#" class="bg-[#00D4CD] w-13 h-13 flex items-center justify-center rounded-full">
              <i class="fab fa-tiktok text-white text-2xl"></i>
            </a> --}}
          </div>
      
          <!-- Garis -->
          <hr class="w-full border-[#E5E5E5]">
      
          <!-- Copyright -->
          <p class="text-[#6A6A6A] font-quicksand font-medium text-lg text-center pt-4">© 2025 Edutopia. All rights reserved.</p>
        </div>
      
         <!-- Tombol Back to Top -->
        <!-- Tambahkan hidden agar tidak tampil awalnya -->
        <button id="scrollToTop" class="fixed bottom-8 right-8 w-16 h-16 rounded-full shadow-lg flex items-center justify-center hidden transition-opacity duration-300 z-[9999]">
          <img src="assets/icon_tombol.svg" alt="Back to Top" class="w-15 h-15 z-60">
        </button>
    </footer>

    <!-- js -->
   <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Scroll effect navbar
    let lastScrollTop = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function () {
      let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

      if (currentScroll > lastScrollTop && currentScroll > 80) {
        navbar.classList.add("fixed", "top-0", "left-0", "w-full", "shadow-md", "bg-white");
      } else if (currentScroll <= 80) {
        navbar.classList.remove("fixed", "top-0", "left-0", "w-full", "shadow-md", "bg-white");
      }

      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });

    // Toggle hamburger menu
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

  // Accordion logic
  function toggleAccordion(index) {
    const content = document.getElementById(`content-${index}`);
    const icon = document.getElementById(`icon-${index}`);

    if (content.classList.contains('max-h-0')) {
      content.classList.remove('max-h-0');
      content.classList.add('max-h-40');
      icon.classList.add('rotate-180');
    } else {
      content.classList.remove('max-h-40');
      content.classList.add('max-h-0');
      icon.classList.remove('rotate-180');
    }
  }

  // Tombol back to top
  const scrollToTopBtn = document.getElementById('scrollToTop');

  scrollToTopBtn.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('scroll', () => {
    if (window.scrollY > 200) {
      scrollToTopBtn.classList.remove('hidden');
      scrollToTopBtn.classList.add('opacity-100');
    } else {
      scrollToTopBtn.classList.add('hidden');
      scrollToTopBtn.classList.remove('opacity-100');
    }
  });

  // Carousel ulasan pengguna
  const track = document.getElementById('carousel-track');
  const cards = document.querySelectorAll('.testimonial-card');
  let cardWidth = document.querySelector('.testimonial-card')?.offsetWidth + 30;
  let index = 0;
  let isTransitioning = false;

  window.addEventListener('resize', () => {
    cardWidth = document.querySelector('.testimonial-card')?.offsetWidth + 30;
  });

  function applyFocusEffect() {
    cards.forEach((card, i) => {
      if (i === index + 1) {
        card.classList.add('scale-80', '-translate-y-2', 'z-10', 'shadow-xl');
        card.classList.remove('shadow-md');
      } else {
        card.classList.remove('scale-80', '-translate-y-2', 'z-10');
        card.classList.add('shadow-md');
      }
    });
  }

  function updateCarousel() {
    isTransitioning = true;
    track.style.transition = 'transform 0.5s ease-in-out';
    track.style.transform = `translateX(-${index * cardWidth}px)`;

    // Reset efek sebelumnya
    cards.forEach(card => {
      card.classList.remove('scale-105', '-translate-y-2', 'z-10', 'shadow-xl');
    });
  }

  track.addEventListener('transitionend', () => {
    isTransitioning = false;

    if (index >= cards.length - 2) {
      track.style.transition = 'none';
      index = 0;
      track.style.transform = `translateX(0px)`;
      setTimeout(() => {
        track.style.transition = 'transform 0.5s ease-in-out';
        applyFocusEffect();
      }, 50);
    } else {
      setTimeout(() => applyFocusEffect(), 100);
    }
  });

  setInterval(() => {
    if (!isTransitioning) {
      index++;
      updateCarousel();
    }
  }, 3000);

  // Start pertama
  applyFocusEffect();
</script>

</body>
</html>