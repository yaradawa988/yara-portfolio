<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Contact extends Model
{
    use HasFactory;

 protected $fillable = [
        'name',
        'email',
        'message',
        'reply',
        'status',
        'is_read',
       'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function messages()
{
    return $this->hasMany(ConversationMessage::class);
}

}
