<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\FollowedItem;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Affiche le tableau de bord principal avec des statistiques.
     */
    public function dashboard()
    {
        $stats = [
            'total_clients' => Client::count(),
            'active_clients' => Client::where('status', 'active')->count(),
            'inactive_clients' => Client::where('status', 'inactive')->count(),
            'total_subscriptions' => Subscription::count(),
            'active_subscriptions' => Subscription::where('status', 'active')->count(),
            'suspended_subscriptions' => Subscription::where('status', 'suspended')->count(),
            'total_followed_items' => FollowedItem::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Affiche la liste des clients.
     */
    public function listClients()
    {
        $clients = Client::orderBy('created_at', 'desc')->get();
        return view('admin.clients.list', compact('clients'));
    }

    /**
     * Affiche les éléments suivis d'un client spécifique.
     */
    public function listFollowedItems($clientId)
    {
        $client = Client::findOrFail($clientId);
        $followedItems = $client->followedItems()->orderBy('created_at', 'desc')->get();
        return view('admin.clients.followed-items', compact('client', 'followedItems'));
    }

    /**
     * Affiche le formulaire d'ajout d'un client.
     */
    public function addClientForm()
    {
        return view('admin.clients.add');
    }

    /**
     * Traite l'ajout d'un client.
     */
    public function addClient(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Client::create($validated);

        return redirect()->route('admin.clients.list')
            ->with('success', 'Client ajouté avec succès.');
    }

    /**
     * Affiche le formulaire de modification d'un client.
     */
    public function editClientForm($clientId)
    {
        $client = Client::findOrFail($clientId);
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Traite la modification d'un client.
     */
    public function editClient($clientId, Request $request)
    {
        $client = Client::findOrFail($clientId);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $client->id,
            'status' => 'required|in:active,inactive',
        ]);

        $client->update($validated);

        return redirect()->route('admin.clients.list')
            ->with('success', 'Client modifié avec succès.');
    }

    /**
     * Désactive un client.
     */
    public function deactivateClient($clientId)
    {
        $client = Client::findOrFail($clientId);
        $client->status = 'inactive';
        $client->save();

        return redirect()->route('admin.clients.list')
            ->with('success', 'Client désactivé avec succès.');
    }

    /**
     * Affiche la liste des abonnements.
     */
    public function manageSubscriptions()
    {
        $subscriptions = Subscription::with('client')->orderBy('created_at', 'desc')->get();
        return view('admin.subscriptions.manage', compact('subscriptions'));
    }

    /**
     * Affiche le formulaire d'ajout d'un abonnement.
     */
    public function addSubscriptionForm()
    {
        $clients = Client::where('status', 'active')->get();
        return view('admin.subscriptions.add', compact('clients'));
    }

    /**
     * Traite l'ajout d'un abonnement.
     */
    public function addSubscription(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type' => 'required|string|max:255',
            'status' => 'required|in:active,suspended',
            'expiry_date' => 'required|date|after:today',
        ]);

        Subscription::create($validated);

        return redirect()->route('admin.subscriptions.manage')
            ->with('success', 'Abonnement ajouté avec succès.');
    }

    /**
     * Affiche le formulaire de modification d'un abonnement.
     */
    public function editSubscriptionForm($subscriptionId)
    {
        $subscription = Subscription::findOrFail($subscriptionId);
        $clients = Client::where('status', 'active')->get();
        return view('admin.subscriptions.edit', compact('subscription', 'clients'));
    }

    /**
     * Traite la modification d'un abonnement.
     */
    public function editSubscription($subscriptionId, Request $request)
    {
        $subscription = Subscription::findOrFail($subscriptionId);

        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type' => 'required|string|max:255',
            'status' => 'required|in:active,suspended',
            'expiry_date' => 'required|date|after:today',
        ]);

        $subscription->update($validated);

        return redirect()->route('admin.subscriptions.manage')
            ->with('success', 'Abonnement modifié avec succès.');
    }

    /**
     * Suspend un abonnement.
     */
    public function suspendSubscription($subscriptionId)
    {
        $subscription = Subscription::findOrFail($subscriptionId);
        $subscription->status = 'suspended';
        $subscription->save();

        return redirect()->route('admin.subscriptions.manage')
            ->with('success', 'Abonnement suspendu avec succès.');
    }
}
