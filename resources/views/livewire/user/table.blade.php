<div>
    
    

    <div class="mt-4">
        <button wire:click='abrirView' class="bg-indigo-600 mt-12 text-white rounded-sm py-2 px-4 mb-4">Criar
            usuário</button>

        @if ($isOpen)
            <div wire:transition>
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
        <table class="table-fixed bg-gray-100 rounded-lg shadow-md border-collapse w-full">

            <thead>
                <tr class="border-collapse w-full">
                    <th class="px-4 py-2">Nome</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Data de Nascimento</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($funcionarios as $funcionario)
                    <tr>
                        <td class="border px-4 py-2">{{ $funcionario->name }}</td>
                        <td class="border px-4 py-2 text-center">{{ $funcionario->email }}</td>
                        <td class="border px-4 py-2 text-center">
                            {{ \Carbon\Carbon::parse($funcionario->date)->tz('America/Sao_Paulo')->format('d/m/Y') }}
                        </td>
                        <td class="border px-4 py-2 items-center flex justify-center gap-1">
                            <button wire:click='delete({{ $funcionario->id }})'
                                class="bg-red-700 text-white px-2 py-1 rounded-md ">Excluir</button>
                            <a href="{{ route('user.edit', ['id' => $funcionario->id]) }}"
                                class="bg-emerald-700 text-white px-2 py-1 rounded-md">Edit</a>

                            {{-- <button wire:click="gerarPdf({{$funcionario->id}})">Gerar PDF</button> --}}

                            <a href="{{ route('gerar-pdf', ['id' => $funcionario->id]) }}">
                                <button class="bg-orange-500 border rounded-md px-2 py-1">Gerar pdf</button>
                            </a>

                        </td>

                    @empty
                        <td class="col-span-4">Nenhum usuario econtrado</td>
                @endforelse
                <div class="">
                    {{ $funcionarios->links() }}

            </tbody>
        </table>

    </div>
</div>
