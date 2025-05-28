@extends('layouts.admin')

@section('title', 'Éléments suivis')

@section('header_title', 'Éléments suivis')

@section('content')
<div class="container mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.clients.list') }}" class="flex items-center text-primary hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Retour à la liste des clients
        </a>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold text-dark mb-2">Informations du client</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-gray-600">Nom:</p>
                <p class="font-medium">{{ $client->name }}</p>
            </div>
            <div>
                <p class="text-gray-600">Email:</p>
                <p class="font-medium">{{ $client->email }}</p>
            </div>
            <div>
                <p class="text-gray-600">Statut:</p>
                <p>
                    @if($client->status === 'active')
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Actif</span>
                    @else
                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Inactif</span>
                    @endif
                </p>
            </div>
            <div>
                <p class="text-gray-600">Date d'ajout:</p>
                <p class="font-medium">{{ $client->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>
    
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-dark">Éléments suivis</h2>
    </div>
    
    <div class="table-container">
        <table class="table w-full">
            <thead>
                <tr>
                    <th class="border-b">ID</th>
                    <th class="border-b">Nom de l'élément</th>
                    <th class="border-b">Date d'ajout</th>
                </tr>
            </thead>
            <tbody>
                @forelse($followedItems as $item)
                <tr class="hover:bg-gray-50">
                    <td class="border-b py-3 px-4">{{ $item->id }}</td>
                    <td class="border-b py-3 px-4 font-medium">{{ $item->item_name }}</td>
                    <td class="border-b py-3 px-4">{{ $item->created_at->format('d/m/Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-4 text-gray-500">Aucun élément suivi trouvé</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
