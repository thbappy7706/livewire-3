<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\This;

class Edit extends Component
{
    use WithFileUploads;

    public ?Student $student;
    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('nullable|image')]
    public $image;

    #[Rule('required')]
    public $classes_id;

    public $section_id;

    public $sections = [];

    public function mount()
    {
        $this->fill($this->student->only(['name', 'email', 'classes_id', 'section_id']));
        $this->sections = Section::where('classes_id', $this->student->classes_id)->get();

    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.student.edit', [
            'classes' => Classes::all(),
        ]);
    }


    public function update()
    {
        $this->validate();
        $student = $this->student->update(
            [
                'name' => $this->name,
                'email' => $this->email,
                'classes_id' => $this->classes_id,
                'section_id' => $this->section_id,
            ]);
        if ($this->image){

        }
        $this->student->addMedia($this->image)
            ->toMediaCollection();

        return redirect()->to('/students');
    }

    public function updatedClassesId($value)
    {
        $this->sections = Section::where('classes_id', $value)->get();
    }
}
