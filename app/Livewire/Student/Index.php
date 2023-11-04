<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('livewire.student.index', [
            'students' => Student::orderByDesc('id')->paginate(10),
        ]);
    }
}
