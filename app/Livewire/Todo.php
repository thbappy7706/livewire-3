<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Todo extends Component
{

    public $todoItem;
    public $todos = [
        'Eating Dinner', 'Sleep', 'Code'
    ];

    public function render(): View
    {
        return view('livewire.todo');
    }

    public function add()
    {
        $this->todos[] = $this->todoItem;
//        $this->todoItem = '';
        $this->reset('todoItem');
    }
}
