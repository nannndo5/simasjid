<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class DonateForm extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $amount = '';

    public string $bank = '';

    public ?\Illuminate\Http\UploadedFile $proof = null;

    public bool $submitted = false;

    

    public function submit(): void
    {
        
        $this->submitted = true;
        
      
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'email', 'phone', 'amount', 'bank', 'proof', 'submitted']);
    }

    public function render()
    {
        return view('livewire.donate-form');
    }
}

