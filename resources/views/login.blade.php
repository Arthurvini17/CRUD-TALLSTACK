<div class="h-screen  not-italic">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <form class="flex items-center justify-center w-full h-full  gap-2" action="{{route('login.index')}}" method="POST">
            <div>
                <img class="w-full hover" src="{{asset('img/Login-cuate.svg')}}" alt="">
             </div>
            <div class="bg-gray-300 p-10 rounded-md shadow-lg flex-col">
            @csrf
            
                <div>
                    <label for="name">Name</label>
                    <input class="border border-slate-950 p-1 w-full" type="text" id="name" name="name" placeholder="Digite seu nome">
                    @error('name')
                   <span id="name">{{$message}}</span> 
                    @enderror
                </div>

                <div>
                    <label for="email">Email</label>
                    <input class="border border-slate-950 p-1 w-full" type="email" id="email" name="email" placeholder="Digite seu email">
                    @error('email')
                    <span id="email">{{$message}}</span> 
                     @enderror
                </div>

                <div>
                    <label for="password">Password</label>
                    <input class="border border-slate-950 p-1 w-full" type="password" id="password" name="password" placeholder="Digite sua senha">
                    @error('password')
                        <span id="password">{{$message}}</span>
                    @enderror
                </div>

                
                <div>
                    <label for="remember">Remember</label>
                    <input type="checkbox" name="remember" id="">
                </div>
              
                  <button class="  bg-cyan-500 hover:bg-cyan-600 text-white p-1 mt-1" type="submit">Register
                    <ellipse cx="130" cy="80" rx="100" ry="50" />
            </div>
        </form>
    </div>
