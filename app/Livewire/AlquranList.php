<?php

namespace App\Livewire;

use App\Models\AlquranMasjid;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AlquranList extends Component
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

    protected function getAlqurans(): array
    {
        $query = AlquranMasjid::query()->orderBy('created_at', 'desc');

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

        $alqurans = $query->get();

        // Transform to array format for view compatibility
        return $alqurans->map(function ($alquran) {
            return [
                'id' => $alquran->id,
                'title' => $alquran->judul,
                'excerpt' => $alquran->excerpt,
                'image' => $alquran->gambar ? Storage::url($alquran->gambar) : asset('picture/masjid.jpg'),
                'slug' => $alquran->slug,
                'url' => route('alquran.show', $alquran->slug),
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
        $alqurans = $this->getAlqurans();

        return view('livewire.alquran-list', [
            'alqurans' => $alqurans,
        ]);
    }
}
