<?php

namespace App\Livewire;

use App\Models\ArtikelMasjid;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlesList extends Component
{
    use WithPagination;

    public ?int $limit = null;

    public string $search = '';

    protected function getArticles(): array
    {
        $query = ArtikelMasjid::query()->orderBy('tanggal', 'desc');

        // Apply search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . $this->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $this->search . '%')
                    ->orWhere('kategori', 'like', '%' . $this->search . '%')
                    ->orWhere('penulis', 'like', '%' . $this->search . '%');
            });
        }

        // Apply limit if set
        if ($this->limit) {
            $query->limit($this->limit);
        }

        $artikels = $query->get();

        // Transform to array format for view compatibility
        return $artikels->map(function ($artikel) {
            return [
                'id' => $artikel->id,
                'title' => $artikel->judul,
                'excerpt' => $artikel->excerpt,
                'date' => $artikel->tanggal->format('d M Y'),
                'author' => $artikel->penulis ?? 'Admin',
                'image' => $artikel->gambar ? Storage::url($artikel->gambar) : asset('picture/masjid.jpg'),
                'slug' => $artikel->slug,
                'category' => $artikel->kategori ?? 'Umum',
                'url' => route('artikel.show', $artikel->slug),
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
        $articles = $this->getArticles();

        return view('livewire.articles-list', [
            'articles' => $articles,
        ]);
    }
}

