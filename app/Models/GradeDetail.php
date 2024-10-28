<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeDetail extends Model
{
    use HasFactory, HasUuids;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grade_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['category_id', 'exam_id', 'user_id', 'value_category_id', 'grade_id', 'total_correct', 'total_wrong', 'grade'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['total_correct' => 'integer', 'total_wrong' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
    }	
	public function exam()
	{
		return $this->belongsTo(\App\Models\Exam::class);
    }	
	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
    }	
	public function value_category()
	{
		return $this->belongsTo(\App\Models\ValueCategory::class);
    }	
	public function grade()
	{
		return $this->belongsTo(\App\Models\Grade::class);
    }
}
