<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Counter')]
class Counter extends Component
{

    public $count = 1;

    public function render()
    {
        return view('livewire.counter');
    }


    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
        if ($this->count < 0) {
            $this->count = 0;
        }
    }

    public function square($by)
    {
        $this->count = $this->count * $by;
    }

    public function resetVal()
    {
        $this->reset();
    }

}
