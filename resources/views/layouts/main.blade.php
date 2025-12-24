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

<body class="h-screen w-screen ">
    <div class=" w-full h-full grid  items-center ">

        <div class="grid grid-cols-[250px_1fr] grid-rows-[auto_1fr] h-full">

            <div class=" col-span-2 p-3 flex justify-between">

                {{-- <a href="/" class="flex    text-lg font-[Roboto] ">
                        <img src="{{ asset('img/logoti3.png') }}" class="w-[50px] h-[50px]" alt="logo">
                        <div class=" ml-3   flex flex-col ">
                            <span class=" font-bold drop-shadow-[0_0_2px_black] text-white tracking-wide">Teknologi
                            </span>
                            <span class=" ml-4 font-bold drop-shadow-[0_0_2px_black] text-white tracking-wide">
                                Informasi
                            </span>
                        </div>
                    </a> --}}
                <div class="">
                    <form action="" class="flex">
                        <input type="text" placeholder="masukan kelas.."
                            class="w-[304px] h-[35px] rounded-[8px] bg-gray-300 placeholder:text-center" name="class">
                        <button class="w-[45px] h-[35px] bg-blue-400 ml-3 rounded-[8px]"><i
                                class="fas fa-search"></i></button>
                    </form>
                </div>

                <div class="flex gap-3">
                    <a href="" class="w-[112px] h-[35px] bg-blue-500 text-center text-white rounded-xs p-1"><i
                            class="fas fa-arrow-left mr-2"></i><span class="">Kembali</span></a>
                    <a href="" class="w-[112px] h-[35px] bg-blue-300 text-center rounded-xs p-1"><span
                            class="">Kembali</span></a>
                    <a href="" class="w-[112px] h-[35px] bg-yellow-500 text-center text-white rounded-xs p-1"><i
                            class="fas fa-edit mr-2"></i><span class="">Update</span></a>
                    <a href="" class="w-[112px] h-[35px] bg-blue-300 text-center rounded-xs p-1"><span
                            class="">Kembali</span></a>
                </div>

            </div>
            <div class=" flex items-center">

                <div class="w-55 bg-gray-700 h-[600px] flex items-center ">

                    <nav class="font-inter flex flex-col sidebar-nav  text-white  scale-95 ">

                        <a href="/"
                            class="flex items-center active-nav-link py-4 pl-6 nav-item hover:scale-90 sidebar-link">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            <span class=" w-full">Dashboard</span>
                        </a>


                        <a href="/course"
                            class="flex items-center active-nav-link py-4 pl-6 nav-item hover:scale-90 sidebar-link">
                            <i class="fas fa-book-open mr-3"></i>
                            <span class=" w-full">Matakuliah</span>
                        </a>

                        <a href="/mahasiswa"
                            class="flex items-center active-nav-link py-4 pl-6 nav-item hover:scale-90 sidebar-link">
                            <i class="fas fa-user-graduate mr-3"></i>
                            <span class=" w-full">Mahassiwa</span>
                        </a>

                        <a href="/kelas"
                            class="flex items-center active-nav-link py-4 pl-6 nav-item hover:scale-90 sidebar-link">
                            <i class="fas fa-users mr-3"></i>
                            <span class=" w-full">Kelas</span>
                        </a>


                        <div class="relative">
                            <button class="dropdown-toggle flex items-center py-4 pl-6 hover:scale-90 sidebar-link">
                                <i class="fas fa-file-alt mr-3"></i>
                                <span>Penugasan Dosen</span>
                                <span id="arrowSelect" class="ml-2 transform rotate-270">&#9662;</span>
                            </button>

                            <div
                                class="   ml-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden  hidden transition-opacity duration-200 -99 text-black">
                                <a href="{{ route('teachingassigment.indexUser') }}"
                                    class="block px-4 py-2  hover:bg-gray-400">
                                    <i class="fas fa-user mr-3"></i>
                                    Penugasan Dosen</a>
                                <a href="{{ route('enrollment.indexUser') }}"
                                    class="block px-4 py-2  hover:bg-gray-400">
                                    <i class="fas fa-user mr-3"></i>
                                    Enrollment</a>


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

                                <a href="{{ route('grade.indexUser') }}" class="block px-4 py-2  hover:bg-gray-400">
                                    <i class="fas fa-user mr-3"></i>
                                    Nilai</a>
                                <a href="{{ route('subgrade.indexUser') }}" class="block px-4 py-2  hover:bg-gray-400">
                                    <i class="fas fa-user-cog mr-3"></i>Sub Nilai</a>

                            </div>
                        </div>






                    </nav>





                </div>


            </div>
            <div class="flex justify-end">
                <div class="bg-[#E3E3D3] w-[996px] h-[650px] mr-16 flex-col p-3">

                    @yield('container')

                </div>
            </div>

        </div>




    </div>

    <script>
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
                arrow.classList.toggle("-rotate-90");

            })
        })
    </script>
</body>

</html>
