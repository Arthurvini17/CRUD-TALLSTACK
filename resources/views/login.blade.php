<div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div>
        <form action="{{route('login.authenticate')}}" method="POST">
            @csrf

            <div class="">
                <label for="">Name</label>
                <input name="name" type="text" placeholder="Digite seu nome">
            </div>

            <div>
                <label for="email">Email</label>
                <input name="email" type="email" placeholder="Digite seu email">
            </div>

            <div>
                <label for="password">Password</label>
                <input name="password" type="password" placeholder="Digite sua senha">
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</div>