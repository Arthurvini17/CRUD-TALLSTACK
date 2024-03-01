<div class="bg-red-500">
    
        <form wire:submit.prevent='save'>

            <div>
                <label for="name">Name </label>
                <input type="text" wire:model='name'>
            </div>

            <div>
                <label for="name">Email </label>
                <input type="text" wire:model='email'>
            </div>

            <div>
                <label for="name">Date Birthday </label>
                <input type="date" wire:model='date'>
            </div>

            <button class="bg-blue-300 p-2 border border-slate-600 rounded-md" type="submit">Submit</button>
        </form>

    @livewireScripts

</div>
