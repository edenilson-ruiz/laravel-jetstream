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
        <div id="form-create-usuario">
            {{-- <x-jet-form-section :submit="$action" class="mb-4"> --}}
            <x-jet-form-section :submit="$action" class="mb-4">

                <x-slot name="title">
                    {{ __('Usuario') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Esta en la sección de creación/actualización de usuario, el cual ayudará a iniciar sesión dentro del sistema') }}
                </x-slot>

                <x-slot name="form">
                    <div class="form-group col-span-6 sm:col-span-5">
                        <x-jet-label for="name" value="{{ __('Nombre') }}" />
                        <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.name" />
                        <x-jet-input-error for="user.name" class="mt-2" />
                    </div>

                    <div class="form-group col-span-6 sm:col-span-5">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.email" />
                        <x-jet-input-error for="user.email" class="mt-2" />
                    </div>

                    @if ($action == "createUser")
                    <div class="form-group col-span-6 sm:col-span-5">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <small>Mínimo 8 caracteres</small>
                        <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password" />
                        <x-jet-input-error for="user.password" class="mt-2" />
                    </div>

                    <div class="form-group col-span-6 sm:col-span-5">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirmar Password') }}" />
                        <small>Mínimo 8 caracteres</small>
                        <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password_confirmation" />
                        <x-jet-input-error for="user.password_confirmation" class="mt-2" />
                    </div>
                    @endif
                </x-slot>

                <x-slot name="actions">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __($button['submit_response']) }}
                    </x-jet-action-message>

                    <x-jet-button>
                        {{ __($button['submit_text']) }}
                    </x-jet-button>
                </x-slot>
            </x-jet-form-section>

            <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
        </div>
    </div>
</x-app-layout>
