<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [ 'title', 'body' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    #================= Title Mutator
    #---for title slug
    public function setTitleAttribute($value): void
    {
        $this->attributes[ 'title' ] = $value;
        $this->attributes[ 'slug' ] = \Str::slug($value);
    }

    public function getUrlAttribute(): string
    {
        return route('questions.show', $this->id);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    #---- accessor for status color---------
    public function getStatusAttribute()
    {
        if ( $this->answers > 0 )
        {
            if ( $this->best_answer_id )
            {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
}
