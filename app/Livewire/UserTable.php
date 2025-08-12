<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserTable extends Component
{
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $user_id = null;
    public $isEditing = false;
    public $showModal = false;
    public $showDeleteModal = false;
    public $deleteUserId = null;
    public $deleteUserName = '';

    // Data Form
    public $username = '';
    public $email = '';
    public $password = '';
    public $phone = '';
    public $origin = '';
    public $age = '';
    public $background = '';
    public $role = '';
    public $is_banned = false;
    public $profile_picture = 'images/defaultProfile.jpg';

    protected $listeners = ['userAdded' => '$refresh'];

    public function save()
    {
        // Validasi dinamis: bedakan create vs edit
        $rules = [
            'username' => [
                'required', 'string', 'max:255',
                Rule::unique('users')->ignore($this->user_id)
            ],
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($this->user_id)
            ],
            'phone' => 'required|string|max:20',
            'origin' => 'required|string|max:255',
            'age' => 'required|integer|between:18,100',
            'background' => 'required|string',
            'role' => 'required|in:user,admin',
            'is_banned' => 'required|boolean',
        ];

        // Password hanya wajib saat create
        if (!$this->user_id) {
            $rules['password'] = 'required|string';
        } else {
            $rules['password'] = 'nullable|string';
        }

        $this->validate($rules);

        if ($this->user_id) {
            // Update user
            $user = User::findOrFail($this->user_id);
            $user->update([
                'username' => $this->username,
                'email' => $this->email,
                'phone' => $this->phone,
                'asal' => $this->origin,
                'umur' => $this->age,
                'latar_belakang' => $this->background,
                'role' => $this->role,
                'is_banned' => $this->is_banned,
            ]);

            if ($this->password) {
                $user->password = Hash::make($this->password);
                $user->save();
            }

            session()->flash('message', 'User berhasil diperbarui!');
        } else {
            // Create user baru
            User::create([
                'username' => $this->username,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'phone' => $this->phone,
                'asal' => $this->origin,
                'umur' => $this->age,
                'latar_belakang' => $this->background,
                'role' => $this->role,
                'is_banned' => $this->is_banned,
                'profile_picture' => $this->profile_picture,
            ]);

            session()->flash('message', 'User berhasil ditambahkan!');
        }

        $this->closeModal();
        $this->dispatch('userAdded');
    }

    public function edit($id)
    {
        // PERBAIKAN: Pastikan modal delete tertutup sebelum buka modal edit
        $this->closeDeleteModal();
        
        $user = User::findOrFail($id);

        $this->user_id = $user->id;
        $this->isEditing = true;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->origin = $user->asal;
        $this->age = $user->umur;
        $this->background = $user->latar_belakang;
        $this->role = $user->role;
        $this->is_banned = $user->is_banned;
        $this->password = '';
        
        $this->showModal = true;
    }

    

    public function create()
    {
        // PERBAIKAN: Pastikan modal delete tertutup sebelum buka modal create
        $this->closeDeleteModal();
        $this->resetForm();
        $this->showModal = true;
    }

    public function confirmDelete($id, $name)
    {
        // PERBAIKAN: Pastikan modal add/edit tertutup sebelum buka modal delete
        $this->closeModal();
        
        $this->deleteUserId = $id;
        $this->deleteUserName = $name;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $user = User::find($this->deleteUserId);
        if ($user) {
            $user->delete();
            session()->flash('message', 'User berhasil dihapus!');
        }

        $this->closeDeleteModal();
        $this->dispatch('userAdded');
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->reset(['deleteUserId', 'deleteUserName']);
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }
    private function resetForm()
    {
        $this->reset([
            'user_id',
            'isEditing',
            'username',
            'email',
            'password',
            'phone',
            'origin',
            'age',
            'background',
            'role',
            'is_banned'
        ]);
        $this->profile_picture = 'images/defaultProfile.jpg'; // reset manual jika perlu
    }

    public function render()
    {
        $users = User::query()
            ->where('username', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
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