<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Modal extends Component
{
    public $contacts;
    public $selectedContact;
    public $isOpen = false;

    public function openModal() {
        $this->isOpen = true;
    }
    public function closeModal() {
        $this->isOpen = false;
    }
    public function render()
    {
        return view('livewire.modal',['contacts'=>Contact::with('category')->paginate(7)]);
    }
}
