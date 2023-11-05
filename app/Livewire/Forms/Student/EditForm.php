<?php

namespace App\Livewire\Forms\Student;

use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Form;

class EditForm extends Form
{
    public ?Student $student;


    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('nullable|image')]
    public $image;

    public $section_id;



    public function setStudent(Student $student)
    {
        $this->student = $student;
        $this->name = $student->name;
        $this->section_id = $student->section_id;
        $this->email = $student->email;
    }

    public function updateData($classId)
    {
        $this->student->update(
            [
                'name' => $this->name,
                'email' => $this->email,
                'classes_id' => $classId,
                'section_id' => $this->section_id,
            ]);
        if ($this->image) {
            $this->student->addMedia($this->image)
                ->toMediaCollection();
        }
    }


}
