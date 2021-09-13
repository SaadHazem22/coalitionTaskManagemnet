<div class="w-full p-10">


    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Enter Project Name</label>
        <input type="text" wire:model="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"   placeholder="Enter Project Name" required>
    </div>
    
    <button wire:click="store()" class="text-blue-600 font-bold">Submit</button>
</div>