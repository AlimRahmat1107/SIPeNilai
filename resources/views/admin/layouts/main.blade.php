<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




</head>

<body class="h-screen bg-gray-100">
    <div class="grid grid-cols-[250px_1fr] grid-rows-[auto_1fr] h-full  ">


        {{-- Humburger button --}}


        <!--Sidebar-->

        {{-- fixed lg:static top-0 left-0 w-64 h-full bg-[#374151] text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 lg:flex flex-col justify-between p-4 shadow-xl z-50 lg:row-span-2 --}}

        <aside id="sidebar" class="lg:row-span-2 bg-[#374151] hidden lg:flex flex-col justify-between">


            <a href="/" class="flex p-2 m-4 border border-blue-700 text-lg font-[Roboto] ">
                <img src="{{ asset('img/logoti3.png') }}" class="w-[50px] h-[50px]" alt="logo">
                <div class=" ml-3   flex flex-col ">
                    <span class=" font-bold drop-shadow-[0_0_2px_black] text-white tracking-wide">Teknologi </span>
                    <span class=" ml-4 font-bold drop-shadow-[0_0_2px_black] text-white tracking-wide"> Informasi
                    </span>
                </div>
            </a>


            <nav class="font-inter flex flex-col sidebar-nav border border-amber-600 text-white  scale-95 ">

                <a href="/"
                    class="flex items-center active-nav-link py-4 pl-6 nav-item hover:scale-90 sidebar-link">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span class=" w-full">Dashboard</span>
                </a>

                <button class="dropdown-toggle flex items-center py-4 pl-6 hover:scale-90 sidebar-link">
                    <i class="fas fa-user mr-3"></i>
                    <span>User</span>
                    <span id="arrowSelect" class="ml-2 transform -rotate-90 ">&#9662;</span>
                </button>

                <div
                    class=" relative  ml-2 w-48 bg-white  shadow-lg rounded-lg overflow-hidden  hidden transition-all duration-750 text-black menu border border-amber-500 ">
                    <a href="/user" class="block px-4 py-2  hover:bg-gray-400"> <i class="fas fa-user mr-3"></i>
                        User</a>
                    <a href="/profiles" class="block px-4 py-2  hover:bg-gray-400"> <i
                            class="fas fa-user-cog mr-3"></i>Profile</a>
                    <a href="/role" class="block px-4 py-2  hover:bg-gray-400"> <i
                            class="fas fa-users mr-3"></i>Role</a>
                    <a href="/provinces" class="block px-4 py-2  hover:bg-gray-400"> <i
                            class="fas fa-map-marked-alt mr-3"></i>Provinsi</a>
                    <a href="/cities" class="block px-4 py-2  hover:bg-gray-400"> <i
                            class="fas fa-city mr-3"></i>Kota</a>
                    <a href="/wards" class="block px-4 py-2  hover:bg-gray-400"> <i
                            class="fas fa-landmark mr-3"></i>Kelurahan</a>
                    <a href="/subdistricts" class="block px-4 py-2  hover:bg-gray-400"> <i
                            class="fas fa-landmark mr-3"></i>Kecamatan</a>
                </div>

                 <div class="relative">
                    <button class="dropdown-toggle flex items-center py-4 pl-6 hover:scale-90 sidebar-link">
                        <i class="fas fa-laptop-code mr-3"></i>
                        <span>Jurusan</span>
                        <span id="arrowSelect" class="ml-2 transform rotate-270">&#9662;</span>
                    </button>

                    <div
                        class="   ml-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden  hidden transition-opacity duration-200 -99 text-black">
                        <a href="/jurusan" class="block px-4 py-2  hover:bg-gray-400"> <i class="fas fa-laptop-code mr-3"></i>
                            Jurusan</a>
                        <a href="/prodi" class="block px-4 py-2  hover:bg-gray-400 whitespace-nowrap" > <i class="fas fa-laptop-code mr-3"></i>
                            Program Studi</a>

                    </div>
                </div>

                <button class="dropdown-toggle flex items-center py-4 pl-6 hover:scale-90 sidebar-link">
                    <i class="fas fa-calendar mr-3"></i>
                    <span>Tahun Akademik</span>
                    <span id="arrowSelect" class="ml-2 transform rotate-270">&#9662;</span>
                </button>


                <div
                    class="ml-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden  hidden transition-opacity duration-200  text-black">
                    <a href="/academicyear" class="block px-4 py-2  hover:bg-gray-400"> <i class="fas fa-user mr-3"></i>
                        Tahun Akademik</a>
                    <a href="/semester" class="block px-4 py-2  hover:bg-gray-400"> <i
                            class="fas fa-user-cog mr-3"></i>Semester</a>
                    <a href="/kurikulum" class="block px-4 py-2  hover:bg-gray-400"> <i
                            class="fas fa-user-cog mr-3"></i>Kurikulum</a>
                  

                </div>

                 <div class="relative">
                    <button class="dropdown-toggle flex items-center py-4 pl-6 hover:scale-90 sidebar-link">
                        <i class="fas fa-file-alt mr-3"></i>
                        <span>Dosen</span>
                        <span id="arrowSelect" class="ml-2 transform rotate-270">&#9662;</span>
                    </button>

                    <div
                        class="   ml-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden  hidden transition-opacity duration-200 -99 text-black">
                        <a href="/dosen" class="block px-4 py-2  hover:bg-gray-400"> <i class="fas fa-user mr-3"></i>
                            Dosen</a>
                        <a href="/penugasan-pengajar" class="block px-4 py-2  hover:bg-gray-400 whitespace-nowrap" > <i class="fas fa-user mr-3"></i>
                            Penugasan Pengajar</a>

                    </div>
                </div>

                <div class="relative">
                    <button class="dropdown-toggle flex items-center py-4 pl-6 hover:scale-90 sidebar-link">
                        <i class="fas fa-user-graduate mr-3"></i>
                        <span>Mahasiswa</span>
                        <span id="arrowSelect" class="ml-2 transform rotate-270">&#9662;</span>
                    </button>

                    <div
                        class="   ml-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden  hidden transition-opacity duration-200 z-99 text-black">
                        <a href="/mahasiswa" class="block px-4 py-2  hover:bg-gray-400"> <i
                                class="fas fa-user mr-3"></i> Mahasiswa</a>
                        <a href="/kelas" class="block px-4 py-2  hover:bg-gray-400"> <i
                                class="fas fa-users mr-3"></i>Kelas</a>
                        <a href="/matakuliah" class="block px-4 py-2  hover:bg-gray-400"> <i
                                class="fas fa-users mr-3"></i>Matakuliah</a>
                        <a href="/scs" class="block px-4 py-2 whitespace-nowrap hover:bg-gray-400 " > <i
                                class="fas fa-users mr-3 "></i>Semester kelas mahasiwa</a>
                        <a href="/csc" class="block px-4 py-2  hover:bg-gray-400"> <i
                                class="fas fa-users mr-3"></i>Mata Kuliah kurikulum semester</a>

                    </div>
                </div>

                <div class="relative">
                    <button class="dropdown-toggle flex items-center py-4 pl-6 hover:scale-90 sidebar-link">
                        <i class="fas fa-file-alt mr-3"></i>
                        <span>Nilai</span>
                        <span id="arrowSelect" class="ml-2 transform rotate-270">&#9662;</span>
                    </button>

                    <div
                        class="   ml-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden  hidden transition-opacity duration-200 -99 text-black">
                        <a href="/enrollment" class="block px-4 py-2  hover:bg-gray-400"> <i class="fas fa-user mr-3"></i>
                            Enrollment</a>
                        <a href="/nilai" class="block px-4 py-2  hover:bg-gray-400"> <i class="fas fa-user mr-3"></i>
                            Nilai</a>
                        <a href="/subnilai" class="block px-4 py-2  hover:bg-gray-400"> <i
                                class="fas fa-user-cog mr-3"></i>Sub Nilai</a>

                    </div>
                </div>


                  





            


            </nav>

            <div class="text-center text-sm text-gray-400 ">
                &copy; 2025 MyWebsite.<br> All rights reserved.
            </div>



        </aside>

        <header class="bg-[#E5E7EB] text-[#111827]  relative p-4 justify-between shadow-md flex    ">

            <div class="ml-auto border border-amber-500">
                <button id="profileButton" class="flex items-center    ">
                    <!-- Foto Profil -->
                    <img src="" alt="Profile Picture" class="w-10 h-10 rounded-full mr-2 ">
                    <div>
                        <h2 class="text-sm   font-semibold">John Doe</h2>
                        <p class="text-xs ">Software Engineer</p>
                    </div>
                    <span id="arrow" class="transform rotate-180 ">&#9662;</span> <!-- Panah dropdown -->


                </button>

                <div id="dropdownMenu"
                    class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden  opacity-0 invisible transition-opacity duration-200">
                    <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile</a>
                    <a href="/logout" class="block px-4 py-2 text-red-600 hover:bg-red-100">Logout</a>
                </div>
            </div>


        </header>



        <!--Main-->
        <main class="bg-gray-200  ">
            @yield('container')

        </main>

        <div class="border border-red-600 "></div>





    </div>


    <script>
        // firut pop up akun
        const profileButton = document.getElementById("profileButton");
        const dropdownMenu = document.getElementById("dropdownMenu");
        const arrow = document.getElementById("arrow")


        profileButton.addEventListener("click", () => {
            dropdownMenu.classList.toggle("opacity-0")
            dropdownMenu.classList.toggle("invisible")
            arrow.classList.toggle("rotate-180");
        })


        profileButton.addEventListener('click', (e) => {
            if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add("opacity-0", "invisible");
                arrow.classList.remove("rotate-180");;
            }
        })

        isOpen = false
        //fitur dropdown sidebar

        document.querySelectorAll(".dropdown-toggle").forEach(toggle => {
            toggle.addEventListener("click", function(event) {
                event.preventDefault(); // Mencegah link  dari berpindah halaman atau refresh 
                let menu = this.nextElementSibling;
                let arrow = this.querySelector('#arrowSelect');
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden', 'opacity-0');
                } else if (!menu.classList.contains('hidden')) {
                    menu.classList.add('hidden', 'opacity-0');
                }


                arrow.classList.toggle("-rotate-90");

            });

        });

        document.addEventListener('click', function(e) {
            document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
                let menu = toggle.nextElementSibling;
                const arrow = toggle.querySelector('#arrowSelect')
                if (!menu.classList.contains('hidden') && !toggle.contains(e.target) && !menu.contains(e
                        .target)) {
                    menu.classList.add('hidden')
                }
                arrow.classList.toggle("")
            })

        })



        //fitur active page
        let currentPage = window.location.pathname;

        let links = document.querySelectorAll(".sidebar-link");

        links.forEach(link => {
            if (link.pathname === currentPage) {
                link.classList.add("text-blue-600", "font-bold", "relative", "-top-2", "left-2")
            } else {
                link.classList.remove("text-blue-600", "font-bold", "relative", "-top-1", "bg-blue-500");
            }

        });
    </script>



</body>

</html>
