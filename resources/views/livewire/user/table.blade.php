<div>
    <header class="bg-gray-400 p-4">
        <nav class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold">CRUD</h1>
            </div>

            <div class="flex items-center gap-3">
                <p class="text-sm">Login</p>
                <p class="text-sm">Register</p>
            </div>
        </nav>
    </header>

    <div class="mt-4">
        <button wire:click='abrirView' class="bg-indigo-600 text-white rounded-sm py-2 px-4 mb-4">Criar usuário</button>
        @if ($isOpen)
            <div>
                @include('livewire.user.form')
            </div>
        @endif
    </div>

    <div class="flex items-center justify-end mr-2 mb-4 ">
        <input class="border-2 border-slate-300 rounded-md outline-none px-4 py-2" type="search" wire:model.live='search'
            placeholder="Procurar...">
            <div class="flex-col items-center justify-center flex">
            @if($search)
            <p>Procurando por: {{$search}}</p>
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
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->date }}</td>
                        <td class="border px-4 py-2 items-center flex justify-center gap-1">
                            <button wire:click='delete({{ $user->id }})' wire:confirm='Tem certeza que deseja excluir?'
                                class="bg-red-700 text-white px-2 py-1">Excluir</button>
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="bg-emerald-700 text-white px-2 py-1">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
