@extends('layouts.admin')

@section('title', 'Modifier un abonnement')

@section('header_title', 'Modifier un abonnement')

@section('content')
<div class="container mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.subscriptions.manage') }}" class="flex items-center text-primary hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Retour u00e0 la liste des abonnements
        </a>
    </div>
    
    <div class="card max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-dark mb-6">Modifier l'abonnement</h2>
        
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p class="font-bold">Des erreurs sont survenues :</p>
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('admin.subscriptions.edit', $subscription->id) }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="client_id" class="block text-dark font-medium mb-2">Client</label>
                <select name="client_id" id="client_id" class="form-input" required>
                    <option value="">Su00e9lectionner un client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id', $subscription->client_id) == $client->id ? 'selected' : '' }}>{{ $client->name }} ({{ $client->email }})</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="type" class="block text-dark font-medium mb-2">Type d'abonnement</label>
                <select name="type" id="type" class="form-input" required>
                    <option value="Premium" {{ old('type', $subscription->type) === 'Premium' ? 'selected' : '' }}>Premium</option>
                    <option value="Standard" {{ old('type', $subscription->type) === 'Standard' ? 'selected' : '' }}>Standard</option>
                    <option value="Basic" {{ old('type', $subscription->type) === 'Basic' ? 'selected' : '' }}>Basic</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="status" class="block text-dark font-medium mb-2">Statut</label>
                <select name="status" id="status" class="form-input" required>
                    <option value="active" {{ old('status', $subscription->status) === 'active' ? 'selected' : '' }}>Actif</option>
                    <option value="suspended" {{ old('status', $subscription->status) === 'suspended' ? 'selected' : '' }}>Suspendu</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label for="expiry_date" class="block text-dark font-medium mb-2">Date d'expiration</label>
                <input type="date" name="expiry_date" id="expiry_date" value="{{ old('expiry_date', $subscription->expiry_date) }}" class="form-input" required>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="btn-primary">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
