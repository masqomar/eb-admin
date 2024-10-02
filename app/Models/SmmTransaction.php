<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmmTransaction extends Model
{
    use HasFactory;

    protected $table = 'smm_transactions';
    protected $fillable = ['service_id', 'target', 'quantity', 'api_response'];
}
