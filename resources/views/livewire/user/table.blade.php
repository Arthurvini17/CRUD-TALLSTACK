<div class="flex items-center justify-center flex-col">
    <div class="mt-4">
        <button wire:click='abrirView' class="bg-indigo-600 text-white rounded-sm py-2 p-2 mb-1">Abrir</button>
        @if ($isOpen)
            <div>

                @include('livewire.user.form')
            </div>

        @endif
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/csp@3.x.x/dist/cdn.min.js"></script>
    <table class="table-fixed bg-gray-100 rounded-lg shadow-md mt-10">
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
                    <td class="border px-4 py-2"><button class="bg-red-700 text-white p-1">Excluir</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

   


</div>
