<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'status'
    ];

    /**
     * Get the subscriptions for the client.
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Get the followed items for the client.
     */
    public function followedItems()
    {
        return $this->hasMany(FollowedItem::class);
    }
}
