<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ParticipantsTypeEnum;

class Participants extends Model
{
    use HasFactory;
    protected $table = 'participants';
    protected $primaryKey = 'id';

    protected $casts = [
        'type' => ParticipantsTypeEnum::class
    ];
}
