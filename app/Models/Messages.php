<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\MessageTypeEnum;

class Messages extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'conversation_id',
        'sender_id',
        'message_type',
        'message',
    ];

    protected $casts = [
        'messages_type' => MessageTypeEnum::class
    ];
}
