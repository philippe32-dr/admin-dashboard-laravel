@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('header_title', 'Tableau de bord')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold text-dark mb-6 flex items-center">
        <i class="fas fa-chart-pie mr-2 text-primary"></i> Vue d'ensemble
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Statistiques des clients -->
        <div class="card bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-dark">Clients</h3>
                <i class="fas fa-users text-3xl text-primary"></i>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="text-center">
                    <p class="text-3xl font-bold text-dark">{{ $stats['total_clients'] }}</p>
                    <p class="text-sm text-gray-500">Total</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-green-500">{{ $stats['active_clients'] }}</p>
                    <p class="text-sm text-gray-500">Actifs</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.clients.list') }}" class="text-primary hover:underline text-sm flex items-center">
                    Voir tous les clients
                    <i class="fas fa-chevron-right ml-1 text-xs"></i>
                </a>
            </div>
        </div>
        
        <!-- Statistiques des abonnements -->
        <div class="card bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-dark">Abonnements</h3>
                <i class="fas fa-credit-card text-3xl text-primary"></i>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="text-center">
                    <p class="text-3xl font-bold text-dark">{{ $stats['total_subscriptions'] }}</p>
                    <p class="text-sm text-gray-500">Total</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-green-500">{{ $stats['active_subscriptions'] }}</p>
                    <p class="text-sm text-gray-500">Actifs</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.subscriptions.manage') }}" class="text-primary hover:underline text-sm flex items-center">
                    Voir tous les abonnements
                    <i class="fas fa-chevron-right ml-1 text-xs"></i>
                </a>
            </div>
        </div>
        
        <!-- Statistiques des éléments suivis -->
        <div class="card bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-dark">Éléments suivis</h3>
                <i class="fas fa-clipboard-list text-3xl text-primary"></i>
            </div>
            <div class="text-center">
                <p class="text-3xl font-bold text-dark">{{ $stats['total_followed_items'] }}</p>
                <p class="text-sm text-gray-500">Total</p>
            </div>
        </div>
    </div>
    
    <!-- Actions rapides -->
    <div class="mt-10">
        <h2 class="text-xl font-semibold text-dark mb-4 flex items-center">
            <i class="fas fa-bolt mr-2 text-primary"></i> Actions rapides
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <a href="{{ route('admin.clients.add.form') }}" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center">
                <i class="fas fa-user-plus text-xl text-primary mr-3"></i>
                <span class="text-dark">Ajouter un client</span>
            </a>
            
            <a href="{{ route('admin.subscriptions.add.form') }}" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center">
                <i class="fas fa-plus-circle text-xl text-primary mr-3"></i>
                <span class="text-dark">Ajouter un abonnement</span>
            </a>
        </div>
    </div>
</div>
@endsection
