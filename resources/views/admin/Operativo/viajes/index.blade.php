<x-admin-layout
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('dashboard')],
        ['name' => 'Operativo', 'href' => route('admin.operativo.viajes.index')],
        ['name' => 'Viajes']
    ]"
>
    <div class="p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-semibold mb-4">Listado de Viajes</h1>

        {{-- Botón para crear nuevo viaje --}}
        <div class="mb-4">
            <a href="{{ route('admin.operativo.viajes.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 inline-flex items-center">
                <i class="bi bi-plus-circle mr-2"></i> Nuevo Viaje
            </a>
        </div>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabla --}}
        <table class="min-w-full border border-gray-200 table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Origen</th>
                    <th class="px-4 py-2 border">Destino</th>
                    <th class="px-4 py-2 border">Activo</th>
                    <th class="px-4 py-2 border">Borrado Lógico</th>
                    <th class="px-4 py-2 border">Usuario Creación</th>
                    <th class="px-4 py-2 border">Fecha Creación</th>
                    <th class="px-4 py-2 border">Usuario Modificación</th>
                    <th class="px-4 py-2 border">Fecha Modificación</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($viajes as $viaje)
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $viaje->Origen }}</td>
                        <td class="px-4 py-2 border">{{ $viaje->Destino }}</td>
                        <td class="px-4 py-2 border">{{ $viaje->FlagActivo ? 'Sí' : 'No' }}</td>
                        <td class="px-4 py-2 border">{{ $viaje->FlagBorradoLogico ? 'Sí' : 'No' }}</td>
                        <td class="px-4 py-2 border">{{ $viaje->UserCreacion }}</td>
                        <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($viaje->FechaCreacion)->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-2 border">{{ $viaje->UserModificacion ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $viaje->FechaModificacion ? \Carbon\Carbon::parse($viaje->FechaModificacion)->format('d/m/Y H:i') : '-' }}</td>
                        <td class="px-4 py-2 border flex gap-2">
                            <a href="{{ route('admin.operativo.viajes.edit', $viaje->IdViaje) }}" class="px-2 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500" title="Editar">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('admin.operativo.viajes.destroy', $viaje->IdViaje) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.operativo.viajes.toggle', $viaje->IdViaje) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-2 py-1 rounded {{ $viaje->FlagActivo ? 'bg-gray-400 hover:bg-gray-500' : 'bg-green-500 hover:bg-green-600' }}" title="{{ $viaje->FlagActivo ? 'Desactivar' : 'Activar' }}">
                                    @if($viaje->FlagActivo)
                                        <i class="bi bi-toggle-off"></i>
                                    @else
                                        <i class="bi bi-toggle-on"></i>
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center px-4 py-2 border">No hay viajes registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
