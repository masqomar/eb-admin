<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory, HasUuids;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['type', 'direction', 'audio_input', 'audio', 'audio_played', 'audio_played_limit', 'audio_answer_time', 'audio_played_finish', 'question', 'option_1', 'option_2', 'option_3', 'option_4', 'option_5', 'value_category_id', 'question_title_id', 'answer', 'discussion', 'section'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['type' => 'integer', 'direction' => 'string', 'audio' => 'string', 'audio_answer_time' => 'integer', 'audio_played_finish' => 'integer', 'answer' => 'integer', 'discussion' => 'string', 'section' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    
	
	public function value_category()
	{
		return $this->belongsTo(\App\Models\ValueCategory::class);
    }	
	public function question_title()
	{
		return $this->belongsTo(\App\Models\QuestionTitle::class);
    }
}
