<?php

namespace App\Livewire\Forms\Student;

use App\Models\Student;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateForm extends Form
{
    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('required|image')]
    public $image;

    public $section_id;

    public function storeData($classId)
    {
        $student = Student::create(
            $this->all() + $classId
        );
        $student
            ->addMedia($this->image)
            ->toMediaCollection();
    }
}
