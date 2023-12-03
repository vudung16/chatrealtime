<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeleteMessages extends Model
{
    use HasFactory;
    protected $table = 'delete_messages';
    protected $primaryKey = 'id';
}
