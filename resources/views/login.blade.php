<div class="h-screen  not-italic">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <form class="" action="{{ route('login.index') }}" method="POST">
        @csrf
        <div class="flex items-center justify-center w-full h-full  gap-2">
            <div>
                <img class="w-full hover" src="{{ asset('img/Login-cuate.svg') }}" alt="">
            </div>
            <div class="bg-gray-300 p-10 rounded-md shadow-lg flex-col">

                <div>
                    <label for="name">Name</label>
                    <input class="border border-slate-950 p-1 w-full rounded-md" name="name" type="text" id="name"
                        placeholder="Digite seu nome">
                    @error('name')
                        <span id="name">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email">Email</label>
                    <input class="border border-slate-950 p-1 w-full rounded-md" name="email" type="email" id="email"
                        placeholder="Digite seu email">
                    @error('email')
                        <span id="email">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password">Password</label>
                    <input class="border border-slate-950 p-1 w-full rounded-md" name="password" type="password" id="password"
                        placeholder="Digite sua senha">
                    @error('password')
                        <span id="password">{{ $message }}</span>
                    @enderror
                </div>


                <div>
                    <label for="remember">Remember</label>
                    <input type="checkbox" name="remember" id="">
                </div>


                <button class="bg-cyan-500 hover:bg-cyan-600 text-white p-1 mt-1" type="submit">Login</button>

                <div
                    class="flex items-center justify-center mt-4 border border-t-black border-b-0 border-r-0 border-l-0">
                    <div
                        class="flex items-center w-28  mt-2 gap-4  hover:cursor-pointer hover:scale-150 ease-in duration-300">
                        <div>
                            <img src="{{ asset('img/google.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('img/github.png') }}" alt="">
                        </div>
                        <div>
                            <img class="" src="{{ asset('img/facebook.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </form>
</div>
