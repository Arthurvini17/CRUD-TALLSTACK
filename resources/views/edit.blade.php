<div class="bg-gray-300 flex items-center justify-center h-screen w-screen">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div>
        <div class="flex items-center justify-center text-lg">
            <h1>Atualizar usuario</h1>
        </div>
        <form class="flex items-center justify-center flex-col gap-2" action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
            @csrf

            <div>
                <label for="name">Atualize o nome</label>
                <input class="w-full border-2 rounded-md border-slate-950 p-1" type="text" name="name" value="{{ $user->name }}">
            </div>
            <div>
                <label for="email">Atualize o email</label>
                <input  class="w-full border-2 rounded-md border-slate-950 p-1" type="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="w-full">
                <label for="date">Atualize a data</label>
                <input  class="w-full border-2 rounded-md border-slate-950 p-1" type="date" name="date" value="{{ $user->date }}">
            </div>
            <button type="submit">Atualizar</button>
        </form>
    </div>
</div>
