<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $student;

    public function render(): View
    {


        return view('livewire.student.index', [
            'students' => Student::orderByDesc('id')->paginate(10),
        ]);
    }


    public function delete(Student $student)
    {

        $this->student = $student;
        $this->alert('warning', 'Are you sure you want to delete?', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmedDeletion',
            'showCancelButton' => true,
            'onDismissed' => '',
            'showDenyButton' => false,
            'onDenied' => '',
            'timerProgressBar' => false,
            'width' => '400',
        ]);

    }


    public function confirmedDeletion()
    {
//        logger('confirmedDeletion called, ID: ' . $this->student);

        $studentInfo = $this->student;
        if ($studentInfo) {
            $studentInfo->delete();
            $this->alert('success', 'The student has been deleted.');


        }

    }

    protected $listeners = [
        'confirmedDeletion',
    ];
}
