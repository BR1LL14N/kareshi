<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTable extends Component
{
   public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    // Untuk modal tambah user
    public $showModal = false;
    public $username, $email, $password, $phone, $origin, $age, $background, $role;

    protected $listeners = ['userAdded' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()
            ->where('username', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.user-table', compact('users'));
    }

    public function setSort($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }


    
}
