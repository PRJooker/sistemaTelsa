<x-admin-layout
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('dashboard')],
        ['name' => 'Operativo', 'href' => route('admin.operativo.viajes.index')],
        ['name' => 'Registrar Viaje']
    ]"
>
    <div class="p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-semibold mb-4">Registrar Viaje</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.operativo.viajes.store') }}" method="POST" class="mb-4 grid gap-4 md:grid-cols-2">
            @csrf
            <div>
                <label for="origen" class="block font-medium text-gray-700">Origen</label>
                <input type="text" name="Origen" id="origen" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div>
                <label for="destino" class="block font-medium text-gray-700">Destino</label>
                <input type="text" name="Destino" id="destino" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="md:col-span-2">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 inline-flex items-center">
                    <i class="bi bi-plus-circle mr-2"></i> Registrar
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
