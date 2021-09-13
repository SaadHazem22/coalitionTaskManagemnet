<div class="w-full p-10">
    <input type="hidden" wire:model="selected_id">
   
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Enter Project Name</label>
        <input type="text" wire:model="name"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="name" placeholder="Enter Project Name" required>
    </div>

    <button wire:click="update()" class="btn btn-primary">Update</button>
</div> 