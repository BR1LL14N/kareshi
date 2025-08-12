<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Layanan;
use Illuminate\Validation\Rule;

class LayananTable extends Component
{

    public $layanans = [];
    public $search = '';

    // Form state
    public $showServiceModal = false;
    public $isEditingService = false;

    public $nama_layanan = '';
    public $deskripsi = '';

    protected $rules = [
        'nama_layanan' => 'required|string|max:100',
        'deskripsi' => 'nullable|string|max:500',
    ];

    public function mount()
    {
        $this->loadLayanans();
    }

    public function loadLayanans()
    {
        $query = Layanan::query();

        if ($this->search) {
            $query->where('nama_layanan', 'like', '%' . $this->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $this->search . '%');
        }

        $this->layanans = $query->get();
    }

    public function updatedSearch()
    {
        $this->loadLayanans();
    }

    // Buka modal tambah
    public function openCreateModal()
    {
        $this->resetErrorBag();
        $this->isEditingService = false;
        $this->resetForm();
        $this->showServiceModal = true;
    }

    // Buka modal edit
    public function openEditModal($id)
    {
        $layanan = Layanan::findOrFail($id);
        $this->resetErrorBag();
        $this->isEditingService = true;
        $this->nama_layanan = $layanan->nama_layanan;
        $this->deskripsi = $layanan->deskripsi;
        $this->showServiceModal = true;
    }

    // Reset form
    private function resetForm()
    {
        $this->nama_layanan = '';
        $this->deskripsi = '';
    }

    // Simpan (Create/Update)
    public function saveService()
    {
        $this->validate();

        if ($this->isEditingService) {
            $layanan = Layanan::findOrFail($this->getRouteKey());
            $layanan->update([
                'nama_layanan' => $this->nama_layanan,
                'deskripsi' => $this->deskripsi,
            ]);
            session()->flash('message', 'Layanan berhasil diperbarui.');
        } else {
            $layanan = Layanan::create([
                'nama_layanan' => $this->nama_layanan,
                'deskripsi' => $this->deskripsi,
            ]);
            session()->flash('message', 'Layanan baru berhasil ditambahkan.');
        }

        $this->closeServiceModal();
        $this->loadLayanans();
        $this->dispatch('service-updated');
    }

    // Tutup modal
    public function closeServiceModal()
    {
        $this->showServiceModal = false;
        $this->isEditingService = false;
        $this->resetForm();
    }

    // Hapus layanan
    public function deleteService($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        session()->flash('message', 'Layanan berhasil dihapus.');
        $this->loadLayanans();
    }
    public function render()
    {
        return view('livewire.layanan-table');
    }
}
