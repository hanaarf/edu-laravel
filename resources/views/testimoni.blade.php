<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Testimonials</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/logo.svg">
  <!-- Link tailwind -->
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
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

    /* tailwind-scrollbar-hide.css */
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}

.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

  </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Navbar -->
    <header id="navbar" class="lg:px-16 px-4 bg-white flex items-center justify-between py-6 border-b border-[#F4F4F4] flex-wrap transition-all duration-300 z-50">
        <div class="flex items-center w-full md:w-auto mb-4 md:mb-0 justify-between">
            <a href="index.html">
                <img src="assets/logo.svg" alt="Logo PutarPintar">
            </a>
      
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

    <!-- testimonial -->
    <section class="py-16 max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-18">Testimonials</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 overflow-y-auto overflow-auto scrollbar-hide">
          
          <!-- Card 1 -->
          <div class="bg-white p-6 rounded-[20px] shadow-md relative lg:w-83 w-full h-50 lg:h-auto">
            <img src="assets/icon_card_ulasan.svg" alt="pattern" class="absolute top-0 right-0 w-25 h-25 -mt-1"/>
            <h3 class="font-bold text-lg text-neutral-950">Bilqis Mareta Winarko</h3>
            <p class="text-sm mt-3 text-neutral-950">bilqismareta@gmail.com</p>
            <p class="mt-8 text-neutral-950 text-sm leading-normal">
              Akhirnya ada aplikasi belajar yang gak ngebosenin. Anak-anak suka, aku juga jadi lebih semangat belajar bareng mereka.
            </p>
          </div>
      
          <!-- Card 2 -->
          <div class="bg-white p-6 rounded-[20px] shadow-md relative lg:w-83 w-full h-50 lg:h-auto">
            <img src="assets/icon_card_ulasan.svg" alt="pattern" class="absolute top-0 right-0 w-25 h-25 -mt-1"/>
            <h3 class="font-bold text-lg text-neutral-950">Maliha</h3>
            <p class="text-sm mt-3 text-neutral-950">malihaturrahman@gmail.com</p>
            <p class="mt-8 text-neutral-950 text-sm leading-normal">
              Suka banget sama tampilannya! Cerah, intuitif, dan semua materi gampang dicari.
            </p>
          </div>
      
          <!-- Card 3 -->
          <div class="bg-white p-6 rounded-[20px] shadow-md relative lg:w-83 w-full h-50 lg:h-auto">
            <img src="assets/icon_card_ulasan.svg" alt="pattern" class="absolute top-0 right-0 w-25 h-25 -mt-1"/>
            <h3 class="font-bold text-lg text-neutral-950">Intan</h3>
            <p class="text-sm mt-3 text-neutral-950">nrintan@gmail.com</p>
            <p class="mt-8 text-neutral-950 text-sm leading-normal">
              Bisa belajar sambil rebahan, sambil nunggu kereta,bahkan sebelum tidur, super fleksibel! 
            </p>
          </div>

          <!-- Card 4 -->
          <div class="bg-white p-6 rounded-[20px] shadow-md relative lg:w-83 w-full h-50 lg:h-auto mt-8">
            <img src="assets/icon_card_ulasan.svg" alt="pattern" class="absolute top-0 right-0 w-25 h-25 -mt-1"/>
            <h3 class="font-bold text-lg text-neutral-950">Nur Khadijah</h3>
            <p class="text-sm mt-3 text-neutral-950">skyielar@gmail.com</p>
            <p class="mt-8 text-neutral-950 text-sm leading-normal">
              Buat yang gampang bosen belajar kayak au, aplikasi ini ngebantu banget! 
            </p>
          </div>  

          <!-- Card 5 -->
          <div class="bg-white p-6 rounded-[20px] shadow-md relative lg:w-83 w-full h-50 lg:h-auto mt-8">
            <img src="assets/icon_card_ulasan.svg" alt="pattern" class="absolute top-0 right-0 w-25 h-25 -mt-1"/>
            <h3 class="font-bold text-lg text-neutral-950">Hana Aulia</h3>
            <p class="text-sm mt-3 text-neutral-950">Hanaulia09@gmail.com</p>
            <p class="mt-8 text-neutral-950 text-sm leading-normal">
              Belajarnya jadi ringan dan fun banget! Desain aplikasinya juga fresh, nggak ngebosenin 
            </p>
          </div>

          <!-- Card 6 -->
          <div class="bg-white p-6 rounded-[20px] shadow-md relative lg:w-83 w-full h-50 lg:h-auto mt-8">
            <img src="assets/icon_card_ulasan.svg" alt="pattern" class="absolute top-0 right-0 w-25 h-25 -mt-1"/>
            <h3 class="font-bold text-lg text-neutral-950">Ahmad Faiz</h3>
            <p class="text-sm mt-3 text-neutral-950">faizz@gmail.com</p>
            <p class="mt-8 text-neutral-950 text-sm leading-normal">
              Awalnya iseng doang nyoba, eh malah ketagihan! Belajar bahasa Inggris jadi gak ngebosenin karena pake video. Mantap sih PutarPintar! 
            </p>
          </div>    

          <!-- Card 7 -->
          <div class="bg-white p-6 rounded-[20px] shadow-md relative lg:w-83 w-full h-50 lg:h-auto mt-8">
            <img src="assets/icon_card_ulasan.svg" alt="pattern" class="absolute top-0 right-0 w-25 h-25 -mt-1"/>
            <h3 class="font-bold text-lg text-neutral-950">Intan</h3>
            <p class="text-sm mt-3 text-neutral-950">nrintan@gmail.com</p>
            <p class="mt-8 text-neutral-950 text-sm leading-normal">
              Bisa belajar sambil rebahan, sambil nunggu kereta,bahkan sebelum tidur, super fleksibel! 
            </p>
          </div>

          <!-- Card 8 -->
          <div class="bg-white p-6 rounded-[20px] shadow-md relative lg:w-83 w-full h-50 lg:h-auto mt-8">
            <img src="assets/icon_card_ulasan.svg" alt="pattern" class="absolute top-0 right-0 w-25 h-25 -mt-1"/>
            <h3 class="font-bold text-lg text-neutral-950">Intan</h3>
            <p class="text-sm mt-3 text-neutral-950">nrintan@gmail.com</p>
            <p class="mt-8 text-neutral-950 text-sm leading-normal">
              Bisa belajar sambil rebahan, sambil nunggu kereta,bahkan sebelum tidur, super fleksibel! 
            </p>
          </div>

          <!-- Card 9 -->
          <div class="bg-white p-6 rounded-[20px] shadow-md relative lg:w-83 w-full h-50 lg:h-auto mt-8">
            <img src="assets/icon_card_ulasan.svg" alt="pattern" class="absolute top-0 right-0 w-25 h-25 -mt-1"/>
            <h3 class="font-bold text-lg text-neutral-950">Intan</h3>
            <p class="text-sm mt-3 text-neutral-950">nrintan@gmail.com</p>
            <p class="mt-8 text-neutral-950 text-sm leading-normal">
              Bisa belajar sambil rebahan, sambil nunggu kereta,bahkan sebelum tidur, super fleksibel! 
            </p>
          </div>          
        </div>
    </section>      
</body>

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
</html>