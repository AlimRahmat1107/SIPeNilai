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

    <body class="h-screen w-screen  bg-login ">
        <div class=" w-full h-full flex justify-center items-center">


            <div class="bg-white rounded-3xl w-[400px] h-auto py-8 px-8 ">
                <div class="text-center text-3xl ">
                    <span class="">Login</span>

                </div>
                <div>
                    <form action="{{route('login.create')}}" method="POST">
                        @csrf
                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-3 text-gray-600" for="email">Masukan Email</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded-xl" id="email"
                                name="email" type="text" required placeholder="Masukan email">
                        </div>
                          @error('email')
                        <div class="text-sm text-red-600 mt-1">
                            {{$message}}
                        </div>
                            
                        @enderror
                 
                        <div class="mt-1 p-2">
                            <label class="block text-sm mb-3 text-gray-600 " for="password">Password</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded-xl" id="password"
                                name="password" type="password" required placeholder="Masukan password">
                        </div>
                      
                     

                          <div class="mt-1 p-2 text-center">
                            <button class="bg-gray-500 hover:bg-[#374151] w-full p-2 rounded-2xl text-white mt-8 mb-4">Masuk</button>
                            <a href="/register" class="border w-full p-2 rounded-2xl text-black mt-4 inline-block">Register</a>
                        </div>



                    </form>
                </div>


            </div>
        </div>
    </body>

    </html>
