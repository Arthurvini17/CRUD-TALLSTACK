<div class="h-screen  not-italic">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <form class="flex items-center justify-center w-full h-full flex-col gap-2" action="{{route('register.create')}}" method="POST">
            <div class="bg-gray-300 p-10 rounded-md shadow-lg">
            @csrf
                <div>
                    <label for="name">Name</label>
                    <input class="border border-slate-950 p-1 w-full" type="text" id="name" name="name" placeholder="Digite seu nome">
                    @error('name')
                   <span>{{$message}}</span> 
                    @enderror
                </div>

                <div>
                    <label for="email">Email</label>
                    <input class="border border-slate-950 p-1 w-full" type="email" id="email" name="email" placeholder="Digite seu email">
                    @error('email')
                    <span>{{$message}}</span> 
                     @enderror
                </div>

                <div>
                    <label for="password">Password</label>
                    <input class="border border-slate-950 p-1 w-full" type="password" id="password" name="password" placeholder="Digite sua senha">
                    @error('password')
                        <span>{{$message}}</span>
                    @enderror
                </div>

                <div>
                    <label for="date">Data do seu nascimento</label>
                    <input class="border border-slate-950 p-1 w-full" type="date" id="date" name="date" placeholder="Data do seu nascimento">
                    @error('date')
                        <span>{{$message}}</span>
                    @enderror
                </div>

                <button class="bg-cyan-500 hover:bg-cyan-600 text-white p-1 mt-1" type="submit">Register</button>
            </div>
        </form>
    </div>
