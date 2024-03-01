<div>
    @livewireStyles

    <div x-data="{ open: false }">
        <button  wire:click="abrirView">Abrir</button>
    </div>

    @if ($isOpen)
        <div>
            @include('livewire.user.form')
            <button  wire:click="fecharView">Fechar</button>
        </div>
      
    @endif

    @livewireScripts
</div>
