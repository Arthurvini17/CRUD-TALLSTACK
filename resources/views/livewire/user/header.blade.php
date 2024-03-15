<div>
<header class="bg-gray-400 p-4 fixed top-0 left-0 right-0 z-50 ">
    <nav class="flex items-center justify-between">
        <div class="flex items-start gap-2">
            <div>
                <h1 class="text-lg font-semibold">CRUD</h1>
            </div>
            <div>
                @guest
                    <p class="text-lg font-semibold underline">Você não esta logado</p>
                @endguest

                @auth
                    <p class="text-lg font-semibold">Olá, {{ Auth::user()->name }}</p>
                @endauth
            </div>
        </div>



        <div class="flex items-center gap-3">
            <a href="{{ route('login.index') }}">
                <p class="text-lg font-semibold">Login</p>
            </a>
            <a href="{{ route('register.index') }}">
                <p class="text-lg font-semibold">Register</p>
            </a>

            @auth
                <form action="{{ route('logout.index') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth
        </div>
    </nav>
     
</header>
</div>