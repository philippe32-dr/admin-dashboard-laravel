<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowedItem extends Model
{
    protected $fillable = [
        'client_id',
        'item_name'
    ];

    /**
     * Get the client that owns the followed item.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
