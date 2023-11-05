<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\Student\EditForm;
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
    public EditForm $form;


    #[Rule('required')]
    public $classes_id;

    public $sections = [];

    public function mount()
    {
        $this->form->setStudent($this->student);
        $this->fill($this->student->only('classes_id'));
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

        $this->form->updateData($this->classes_id);

        return redirect()->route('students.index')
            ->with('status', 'Student details updated successfully.');
    }

    public function updatedClassesId($value)
    {
        $this->sections = Section::where('classes_id', $value)->get();
    }
}
