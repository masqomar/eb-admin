<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tenants';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['subdomain', 'account_bank', 'account_number', 'account_name', 'address', 'snk', 'subdomain_link', 'user_id', 'phone_number'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['subdomain' => 'string', 'account_bank' => 'string', 'account_number' => 'string', 'account_name' => 'string', 'subdomain_link' => 'string', 'user_id' => 'string', 'phone_number' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    
	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
    }
}
