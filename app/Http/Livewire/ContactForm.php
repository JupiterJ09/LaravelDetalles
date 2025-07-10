<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';
    
    public function submit()
{
    

    try {
        $validated = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        Contact::create($validated);
        
        session()->flash('success', '¡Mensaje enviado! Gracias por contactarnos.');
        $this->reset();

    } catch (\Exception $e) {
        session()->flash('error', 'Ocurrió un error: ' . $e->getMessage());
    }
}

    public function render()
    {
      
        return view('livewire.contact-form');
    }
}
