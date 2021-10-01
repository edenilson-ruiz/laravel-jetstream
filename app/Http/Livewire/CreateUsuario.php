<?php

namespace App\Http\Livewire;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUsuario extends Component
{
    public $usuario;
    public $usuarioId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = ($this->action == "updateUser") ? [
            'usuario.usuario_nombres' => 'required|email|unique:usuarios,email,' . $this->usuarioId
        ] : [
            'usuario.usuario_apellidos' => 'required|min:8|confirmed',
            'usuario.password_confirmation' => 'required' // livewire need this
        ];

        return array_merge([
            'usuario.name' => 'required|min:3',
            'usuario.email' => 'required|email|unique:usuarios,email'
        ], $rules);
    }

    public function createUser ()
    {
        $this->resetErrorBag();
        $this->validate();

        $password = $this->usuario['password'];

        if ( !empty($password) ) {
            $this->usuario['password'] = Hash::make($password);
        }

        User::create($this->usuario);

        $this->emit('saved');
        $this->reset('usuario');
    }

    public function updateUser ()
    {
        $this->resetErrorBag();
        $this->validate();

        User::query()
            ->where('id', $this->usuarioId)
            ->update([
                "name" => $this->usuario->name,
                "email" => $this->usuario->email,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->usuario && $this->usuarioId) {
            $this->usuario = User::find($this->usuarioId);
        }

        $this->button = create_button($this->action, "User");
    }

    public function render()
    {
        return view('livewire.create-usuario');
    }
}
