<div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Sorry!</strong> invalid input.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($updateMode)
        @include('livewire.projects.update')
    @else
        @include('livewire.projects.create')
    @endif
    @if (count($projects))
    <div class="felx w-full mt-10 p-4">
        
        <section class="container mx-auto p-6 font-mono">
            <h1 class="font-bold">Projects List:</h1>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
              <div class="w-full overflow-x-auto">
                <table class="w-full">
                  <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                      <th class="px-4 py-3">NO</th>
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">CREATED AT</th>
                      <th class="px-4 py-3">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                      @foreach ($projects as $row)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-ms font-semibold border">{{ $row->id}}</td>
                            <td class="px-4 py-3 text-xs border">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{ $row->name}} </span>
                            </td>
                            <td class="px-4 py-3 text-sm border">{{ $row->created_at}}</td>
                            <td  class="px-4 py-3 text-ms font-semibold border">
                                <button wire:click="edit({{$row->id}})" class="btn btn-sm btn-outline-danger py-0 text-blue-500 font-bold text-sm">Edit</button> | 
                                <button wire:click="destroy({{$row->id}})" class="btn btn-sm btn-outline-danger py-0 text-red-500 font-bold text-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
        </section>  
       
        
    </div>
        
    @else
        <p class="text-center">
            <strong class="text-red-50 py-10">NO Projects To Be Shown</strong>
        </p>
     
    @endif
   
</div>
