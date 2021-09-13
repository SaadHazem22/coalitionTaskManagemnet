<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
class Projects extends Component
{
    public $name, $selected_id ;
    public $updateMode = false;

    public function render()
    {   
        $projects =  Project::all();
        
        return view('livewire.projects.index')->with(['projects'=>$projects]);
    }

    private function resetInput()
    {
        $this->name = null;
    }

    public function store()
    {

        $this->validate([
            'name' => 'required|min:5',

        ]);
        Project::create([

            'name' => $this->name,
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Project::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5',
        ]);

        if ($this->selected_id) {
            $record = Project::find($this->selected_id);
            $record->update([
                'name' => $this->name,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Project::where('id', $id)->delete();//Soft Delete
            return $record;
        }
    }
}
