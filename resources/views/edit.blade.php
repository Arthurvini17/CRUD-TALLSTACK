<div class="bg-white flex items-center justify-center h-screen w-screen">
    <div class="bg-gray-300 p-10 rounded-lg shadow-xl">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <div>
            <div class="flex items-center justify-center text-lg">
                <h1>Atualizar usuario</h1>
            </div>
            <form class="flex items-center justify-center flex-col gap-2"
                action="{{ route('user.update', ['id' => $funcionario->id]) }}" method="POST">
                @csrf

                <div>
                    <label for="name">Atualize o nome</label>
                    <input class="w-full border  border-slate-950 rounded-md p-2" type="text" name="name"
                        value="{{ $funcionario->name }}">
                </div>
                <div>
                    <label for="email">Atualize o email</label>
                    <input class="w-full border  border-slate-950 rounded-md p-2" type="email" name="email"
                        value="{{ $funcionario->email }}">
                </div>
                <div class="w-full">
                    <label for="date">Atualize a data</label>
                    <input class="w-full border  border-slate-950 rounded-md p-2" type="date" name="date"
                        value="{{ $funcionario->date }}">
                </div>


        </div>
        <div class="flex items-center justify-between gap-10">
            <a href="{{ route('welcome') }}">
                <img class="w-10 hover:scale-110 ease-in duration-300 after:border border-b-2 border-black drop-shadow-lg"  src="{{ asset('img/voltar.png') }}" alt="Voltar">
            </a>
            <button class="bg-blue-300 shadow-md rounded-md border border-black hover:scale-110 ease-in duration-300 p-2" type="submit">Atualizar</button>
            </form>
        </div>
    </div>

</div>
