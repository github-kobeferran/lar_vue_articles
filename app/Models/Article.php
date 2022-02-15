<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $appends = ['date_to_string'];

    protected static function newFactory()
    {
        return ArticleFactory::new();
    }
    
    // public function setDateToStringAttribute()
    // {
    //     if($this->created_at)
    //         $this->attributes['date_to_string'] = $this->created_at->format('MMMM DD OY hh:mm');
    //     else 
    //         return null;
    // }
    public function getDateToStringAttribute()
    {
        if($this->created_at)
            return $this->created_at->isoFormat('MMMM DD, OY hh:mm A');
        else 
            return '[Date not specified]';
    }


}
