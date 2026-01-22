<?php

namespace App\Livewire;

use Livewire\Component;

class NewsletterSubscribe extends Component
{
    public string $email = '';

    public bool $subscribed = false;



    public function subscribe(): void
    {

        $this->subscribed = true;
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.newsletter-subscribe');
    }
}

