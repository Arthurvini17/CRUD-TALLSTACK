<div class=" absolute inset-0 flex justify-center items-center h-screen">
    <div class="  bg-gray-500 w-[32rem] h-[32rem]  border-slate-900 rounded-lg shadow-lg p-8">
        <div class="flex items-center justify-center">
        <h1 class="text-2xl mb-4">Create a User</h1>
        </div>

        <form class="grid grid-cols-1 gap-4 " wire:submit.prevent="save">
            <div>
                <label for="name" class="block">Name</label>
                <input id="name" class="p-1 w-full border-gray-300 rounded-md focus:border-sky-400 focus:ring focus:ring-sky-200" type="text" wire:model.lazy.blur="name">
                @error('name') 
                <span>{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="block">Email</label>
                <input id="email" class="p-1 w-full border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-200" type="email" wire:model.lazy="email">
                @error('email') 
                <span>{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="date" class="block">Date of Birth</label>
                <input id="date" class=" p-1 w-full border-gray-300 focus:border-sky-400 focus:ring focus:ring-sky-200" type="date" wire:model.lazy="date">
                @error('date') 
                <span>{{$message}}</span>
                @enderror
            </div>

            <button wire:loading.class="opacity-50" class="bg-blue-300 p-2 border border-slate-600 rounded-md" type="submit">Submit</button>
        </form>
      
        <button wire:click='fecharView' class="bg-red-600 rounded-sm py-2 p-2 mt-2 text-white">Fechar</button>

    </div>
</div>

