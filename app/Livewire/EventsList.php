<?php

namespace App\Livewire;

use App\Models\KegiatanMasjid;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class EventsList extends Component
{
    use WithPagination;

    public ?int $limit = null;

    public string $search = '';

    protected $listeners = ['searchUpdated' => 'updateSearch'];

    public function updateSearch(string $search): void
    {
        $this->search = $search;
        $this->resetPage();
    }

    protected function getEvents(): array
    {
        $query = KegiatanMasjid::query()
            ->orderBy('tanggal', 'desc');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . $this->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->limit) {
            $query->limit($this->limit);
        }

        $kegiatans = $query->get();

        return $kegiatans->map(function ($kegiatan) {
            return [
                'id' => $kegiatan->id,
                'title' => $kegiatan->judul,
                'excerpt' => $kegiatan->deskripsi ?? 'Tidak ada deskripsi',
                'date' => $kegiatan->tanggal?->format('d M Y') ?? '-',
                'time' => $kegiatan->waktu ? substr($kegiatan->waktu, 0, 5) . ' WIB' : '-',
                'image' => $kegiatan->gambar ? Storage::url($kegiatan->gambar) : asset('picture/masjid.jpg'),
                'slug' => $kegiatan->slug,
                'url' => route('kegiatan.show', $kegiatan->slug),
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
        $events = $this->getEvents();

        return view('livewire.events-list', [
            'events' => $events,
        ]);
    }
}

