<div class="w-full p-10">
    <input type="hidden" wire:model="selected_id">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="project_id">Select A Project</label>
        <select type="text" wire:model="project_id" id="project_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
           
            @foreach ($projects as $project)
                <option value="{{ $project->id}}">{{ $project->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Enter Task Name</label>
        <input type="text" wire:model="name"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="name" placeholder="Enter Task Name" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="priority">Enter Task Priority</label>
        <input type="number" min="0" wire:model="priority" id="priority" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  placeholder="Enter Task Priority" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Enter Task Description</label>
        <textarea  wire:model="description"  id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  placeholder="Enter Task Description" required>
        </textarea>
    </div>
    <button wire:click="update()" class="btn btn-primary">Update</button>
</div> 