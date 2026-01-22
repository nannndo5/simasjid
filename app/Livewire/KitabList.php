<?php

namespace App\Livewire;

use App\Models\KitabMasjid;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class KitabList extends Component
{
    use WithPagination;

    public ?int $limit = null;

    public string $search = '';

    protected $listeners = ['searchUpdated' => 'updateSearch'];

    public function updateSearch($search): void
    {
        if (is_array($search) && isset($search['search'])) {
            $this->search = $search['search'];
        } elseif (is_string($search)) {
            $this->search = $search;
        } else {
            $this->search = '';
        }
        $this->resetPage();
    }

    protected function getKitabs(): array
    {
        $query = KitabMasjid::query()->orderBy('created_at', 'desc');

        // Apply search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . $this->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $this->search . '%');
            });
        }

        // Apply limit if set
        if ($this->limit) {
            $query->limit($this->limit);
        }

        $kitabs = $query->get();

        // Transform to array format for view compatibility
        return $kitabs->map(function ($kitab) {
            return [
                'id' => $kitab->id,
                'title' => $kitab->judul,
                'excerpt' => $kitab->excerpt,
                'image' => $kitab->gambar ? Storage::url($kitab->gambar) : asset('picture/masjid.jpg'),
                'slug' => $kitab->slug,
                'url' => route('kitab.show', $kitab->slug),
            ];
        })->toArray();
    }

    public function mount(?int $limit = null): void
    {
        $this->limit = $limit;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $kitabs = $this->getKitabs();

        return view('livewire.kitab-list', [
            'kitabs' => $kitabs,
        ]);
    }
}
