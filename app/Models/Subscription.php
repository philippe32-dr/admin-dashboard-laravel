<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'client_id',
        'type',
        'status',
        'expiry_date'
    ];

    /**
     * Get the client that owns the subscription.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
