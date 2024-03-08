<div class="h-screen">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <form class="flex items-center justify-center w-full h-full flex-col gap-2" action="{{route('register.create')}}" method="POST">
            @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Digite seu nome">
                    @error('name')
                   <span>{{$message}}</span> 
                    @enderror
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu email">
                    @error('email')
                    <span>{{$message}}</span> 
                     @enderror
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Digite sua senha">
                </div>

                <div>
                    <label for="date">Data do seu nascimento</label>
                    <input type="date" id="date" name="date" placeholder="Data do seu nascimento">
                </div>

                <button type="submit">Login</button>
        </form>
    </div>
