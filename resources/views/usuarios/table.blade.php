<div>
    <x-data-table :data="$data" :model="$usuarios">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('usuario_nombres')" role="button" href="#">
                    Nombre
                    @include('components.sort-icon', ['field' => 'usuario_nombres'])
                </a></th>
                <th><a wire:click.prevent="sortBy('usuario_apellidos')" role="button" href="#">
                    Apellidos
                    @include('components.sort-icon', ['field' => 'usuario_apellidos'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Fecha de Creación
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Acción</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($usuarios as $usuario)
                <tr x-data="window.__controller.dataTableController({{ $usuario->id }})">
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->usuario_nombres }}</td>
                    <td>{{ $usuario->usuario_apellidos }}</td>
                    <td>{{ $usuario->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/user/edit/{{ $usuario->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
