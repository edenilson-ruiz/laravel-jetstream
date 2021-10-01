<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Datos del Usuario') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Datos del Usuario</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="usuario" :model="$usuario" />
    </div>
</x-app-layout>
