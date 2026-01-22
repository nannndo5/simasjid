<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public string $query = '';

    public string $placeholder = 'Cari...';

    public string $type = 'all';

    public function mount(?string $placeholder = null, ?string $type = null): void
    {
        if ($placeholder) {
            $this->placeholder = $placeholder;
        }

        if ($type) {
            $this->type = $type;
        }
    }

    public function updatedQuery(): void
    {
        $this->dispatch('searchUpdated', search: $this->query);
    }

    public function clearSearch(): void
    {
        $this->query = '';
        $this->updatedQuery();
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
