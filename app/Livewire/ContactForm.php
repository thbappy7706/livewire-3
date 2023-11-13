<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;


class ContactForm extends Component
{

    #[Rule('required|min:3')]
    public $name;
    #[Rule('required|email')]
    public $email;
    #[Rule('required')]
    public $phone;
    public $message;

    public function mount()
    {

    }

    public function submit()
    {

    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
