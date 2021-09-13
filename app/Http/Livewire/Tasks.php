<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\Project;
class Tasks extends Component
{
    public $data, $project_id , $name, $priority, $description ,$selected_id , $record;
    public $updateMode = false;

    public function render()
    {   
        $tasks = Task::orderBy('priority')->get();
        $projects = Project::all();
        return view('livewire.tasks.index')->with(['tasks'=>$tasks , 'projects' => $projects]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->priority = null;
        $this->project_id = null;
        $this->description = null;
        $this->record = null;
    }

    public function store()
    {

        $this->validate([
            'name' => 'required|min:5',
            'priority' => 'required|integer',
            'description'=> 'required:min:50',
        ]);
        Task::create([
            'project_id' => $this->project_id,
            'name' => $this->name,
            'priority' => $this->priority,
            'description' => $this->description,
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Task::findOrFail($id);
       
        $this->selected_id = $id;
        $this->project_id = $record->project->id;
        $this->name = $record->name;
        $this->priority = $record->priority;
        $this->description = $record->description;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5',
            'priority' => 'required|integer|unique',
            'description'=> 'required:min:50',
        ]);
        if ($this->selected_id) {
            $record = Task::find($this->selected_id);
            $record->update([
                'project_id' => $this->project_id,
                'name' => $this->name,
                'priority' => $this->priority,
                'description' => $this->description,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Task::where('id', $id)->delete();//Soft Delete
            return $record;
        }
    }

    public function updateTaskPrority($list)
    {
        dd($list);
        
        foreach($list as $item)
        {   
            Task::find($item['value'])->update(['priority' => $item['order'],]); 
        }
        
    }

    
}
