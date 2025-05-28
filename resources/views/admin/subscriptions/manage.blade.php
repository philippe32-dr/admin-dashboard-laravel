@extends('layouts.admin')

@section('title', 'Gestion des abonnements')

@section('header_title', 'Gestion des abonnements')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-dark">Liste des abonnements</h2>
        <a href="{{ route('admin.subscriptions.add.form') }}" class="btn-primary flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Ajouter un abonnement
        </a>
    </div>
    
    <div class="table-container">
        <table class="table w-full">
            <thead>
                <tr>
                    <th class="border-b">ID</th>
                    <th class="border-b">Client</th>
                    <th class="border-b">Type</th>
                    <th class="border-b">Statut</th>
                    <th class="border-b">Date d'expiration</th>
                    <th class="border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subscriptions as $subscription)
                <tr class="hover:bg-gray-50">
                    <td class="border-b py-3 px-4">{{ $subscription->id }}</td>
                    <td class="border-b py-3 px-4 font-medium">{{ $subscription->client->name }}</td>
                    <td class="border-b py-3 px-4">{{ $subscription->type }}</td>
                    <td class="border-b py-3 px-4">
                        @if($subscription->status === 'active')
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Actif</span>
                        @else
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Suspendu</span>
                        @endif
                    </td>
                    <td class="border-b py-3 px-4">{{ \Carbon\Carbon::parse($subscription->expiry_date)->format('d/m/Y') }}</td>
                    <td class="border-b py-3 px-4">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.subscriptions.edit.form', $subscription->id) }}" class="text-yellow-500 hover:text-yellow-700" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            @if($subscription->status === 'active')
                            <form action="{{ route('admin.subscriptions.suspend', $subscription->id) }}" method="POST" class="inline" onsubmit="return confirm('u00cates-vous su00fbr de vouloir suspendre cet abonnement?')">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Suspendre">
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
                    <td colspan="6" class="text-center py-4 text-gray-500">Aucun abonnement trouvu00e9</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
