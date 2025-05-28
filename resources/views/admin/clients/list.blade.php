@extends('layouts.admin')

@section('title', 'Liste des clients')

@section('header_title', 'Gestion des clients')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-dark">Liste des clients</h2>
        <a href="{{ route('admin.clients.add.form') }}" class="btn-primary flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Ajouter un client
        </a>
    </div>
    
    <div class="table-container">
        <table class="table w-full">
            <thead>
                <tr>
                    <th class="border-b">ID</th>
                    <th class="border-b">Nom</th>
                    <th class="border-b">Email</th>
                    <th class="border-b">Statut</th>
                    <th class="border-b">Date d'ajout</th>
                    <th class="border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $client)
                <tr class="hover:bg-gray-50">
                    <td class="border-b py-3 px-4">{{ $client->id }}</td>
                    <td class="border-b py-3 px-4 font-medium">{{ $client->name }}</td>
                    <td class="border-b py-3 px-4">{{ $client->email }}</td>
                    <td class="border-b py-3 px-4">
                        @if($client->status === 'active')
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Actif</span>
                        @else
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Inactif</span>
                        @endif
                    </td>
                    <td class="border-b py-3 px-4">{{ $client->created_at->format('d/m/Y') }}</td>
                    <td class="border-b py-3 px-4">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.clients.followed-items', $client->id) }}" class="text-blue-500 hover:text-blue-700" title="Voir les éléments suivis">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="{{ route('admin.clients.edit.form', $client->id) }}" class="text-yellow-500 hover:text-yellow-700" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            @if($client->status === 'active')
                            <form action="{{ route('admin.clients.deactivate', $client->id) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir désactiver ce client?')">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Désactiver">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                    </svg>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Aucun client trouvé</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
