<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationMessage extends Model
{
    use HasFactory;
      protected $fillable = ['contact_id', 'sender_type', 'message', 'is_read'];

    public function contact() {
        return $this->belongsTo(Contact::class);
    }
}
