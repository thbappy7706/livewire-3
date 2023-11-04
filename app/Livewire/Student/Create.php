<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

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

    public function render()
    {
        return view('livewire.student.create', [
            'classes' => Classes::all(),
        ]);
    }

    public function save()
    {
//request()->all()['components'][0]['updates'];
        $this->validate();
        $student = Student::create([
            'name' => $this->name,
            'email' => $this->email,
            'classes_id' => $this->classes_id,
            'section_id' => $this->section_id,
        ]);
        $student
            ->addMedia($this->image)
            ->toMediaCollection();

        return redirect()->to('/students');
    }

    public function updatedClassesId($value)
    {
        $this->sections = Section::where('classes_id', $value)->get();
    }

}
