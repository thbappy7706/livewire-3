<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\Student\CreateForm;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;
    use LivewireAlert;

    public CreateForm $form;

    #[Rule('required')]
    public $classes_id;

    public $sections = [];

    public function render(): View
    {
        return view('livewire.student.create', [
            'classes' => Classes::all(),
        ]);
    }

    public function save()
    {
        //request()->all()['components'][0]['updates'];
        $this->validate();
        $this->form->storeData(['classes_id' => $this->classes_id]);
        redirect(route('students.index'));
        $this->alert('success', 'Hello!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);

    }

    public function updatedClassesId($value)
    {
        $this->sections = Section::where('classes_id', $value)->get();
    }

}
