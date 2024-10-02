<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasUuids;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'exam_id', 'code', 'voucher_activated', 'voucher_used', 'total_purchases', 'maximum_payment_time', 'transaction_status', 'voucher_token', 'invoice', 'program_id', 'snap_token', 'program_date', 'program_time', 'note', 'discount', 'period', 'admin_fee', 'down_payment', 'aff_id'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['code' => 'string', 'total_purchases' => 'double', 'maximum_payment_time' => 'datetime:d/m/Y H:i', 'voucher_token' => 'string', 'invoice' => 'string', 'snap_token' => 'string', 'program_date' => 'date:d/m/Y', 'program_time' => 'datetime:H:i', 'discount' => 'integer', 'period' => 'string', 'admin_fee' => 'integer', 'down_payment' => 'integer', 'aff_id' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
    }	
	public function exam()
	{
		return $this->belongsTo(\App\Models\Exam::class);
    }	
	public function program()
	{
		return $this->belongsTo(\App\Models\Program::class);
    }
    public function tenant()
	{
		return $this->belongsTo(\App\Models\Tenant::class, 'aff_id', 'id');
    }
}
