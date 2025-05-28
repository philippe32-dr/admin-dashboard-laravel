@extends('layouts.admin')

@section('title', 'Ajouter un client')

@section('header_title', 'Ajouter un client')

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
    
    <div class="card max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-dark mb-6">Ajouter un nouveau client</h2>
        
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
        
        <form action="{{ route('admin.clients.add') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="block text-dark font-medium mb-2">Nom</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input" required>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-dark font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input" required>
            </div>
            
            <div class="mb-6">
                <label for="status" class="block text-dark font-medium mb-2">Statut</label>
                <select name="status" id="status" class="form-input" required>
                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Actif</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactif</option>
                </select>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="btn-primary">
                    Ajouter le client
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
