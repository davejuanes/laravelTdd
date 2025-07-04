<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Repositorios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-right mb-4">
                <a href="{{ route('repositories.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 text-xs">
                    Agregar un nuevo repositorio
                </a>
            </p>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>URL</th>
                            <th colspan="3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($repositories as $repository)
                            <tr>
                                <td class="border px-4 py-2">{{ $repository->id }}</td>
                                <td class="border px-4 py-2">{{ $repository->url }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('repositories.show', $repository) }}" class="text-blue-500">
                                        Ver
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('repositories.edit', $repository) }}" class="text-blue-500">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('repositories.destroy', $repository) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Eliminar" class="px-4 rounded-md bg-red-500 text-white">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No hay repositorios creados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
