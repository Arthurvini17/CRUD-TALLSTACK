<div>
    <header class="bg-gray-400 p-4 fixed top-0 left-0 right-0 z-50">
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

    <div class="mt-4">
        <button wire:click='abrirView' class="bg-indigo-600 mt-12 text-white rounded-sm py-2 px-4 mb-4">Criar
            usuário</button>

        @if ($isOpen)
            <div>
                @include('livewire.user.form')
            </div>
        @endif
    </div>

    <div class="flex items-end justify-end mr-2 mb-4 flex-col">
        <div class="flex items-center">
            <input class="border-2 border-slate-300 rounded-md outline-none px-4 py-2" type="search"
                wire:model.live='search' placeholder="Procurar...">
        </div>
        <div class="flex items-start justify-start">
            @if ($search)
                <p>Procurando por: {{ $search }}</p>
            @endif

            
        </div>
    </div>

    <div class="flex flex-col">
        <table class="table-fixed bg-gray-100 rounded-lg shadow-md">

            <thead>
                <tr>
                    <th class="px-4 py-2">Nome</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Data de Nascimento</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td class="border px-4 py-2">{{ $funcionario->name }}</td>
                        <td class="border px-4 py-2">{{ $funcionario->email }}</td>
                        <td class="border px-4 py-2">{{ $funcionario->date }}</td>
                        <td class="border px-4 py-2 items-center flex justify-center gap-1">
                            <button wire:click='delete({{ $funcionario->id }})'
                                wire:confirm='Tem certeza que deseja excluir?'
                                class="bg-red-700 text-white px-2 py-1">Excluir</button>
                            <a href="{{ route('user.edit', ['id' => $funcionario->id]) }}"
                                class="bg-emerald-700 text-white px-2 py-1">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
