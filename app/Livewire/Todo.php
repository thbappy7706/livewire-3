<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todos')]
class Todo extends Component
{

    public $todoItem = '';
    public $todos = [];

    public function mount()
    {
        $this->todos = ['Eating Dinner', 'Sleep', 'Code'];
    }

    public function updatedTodoItem($val)
    {
        $this->todoItem = strtoupper($val);
    }

//    public function updated($pro, $val)
//    {
//        $this->$pro = strtoupper($val);
//    }

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
