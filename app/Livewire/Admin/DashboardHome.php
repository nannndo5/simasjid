<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DashboardHome extends Component
{
    // Placeholder data - replace with real data from database when backend is ready
    public array $stats = [];

    public function mount(): void
    {
        // TODO: Replace with real database queries when backend is ready
        // Example:
        // $this->stats = [
        //     'events' => Event::count(),
        //     'articles' => Article::count(),
        //     'donations' => Donation::where('status', 'confirmed')->sum('amount'),
        //     'subscribers' => NewsletterSubscriber::count(),
        // ];

        // Placeholder data for UI demonstration
        $this->stats = [
            'events' => 12,
            'articles' => 45,
            'donations' => 12500000,
            'subscribers' => 234,
        ];
    }

    public function render()
    {
        return view('livewire.admin.dashboard-home')
            ->layout('components.layouts.app', [
                'title' => 'Dashboard',
            ]);
    }
}

