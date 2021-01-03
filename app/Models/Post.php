<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'sub_title', 'description', 'image_path', 'file_path', 'date', 'start_time', 'end_time', 'location', 'category', 'video_link', 'landing_page'];

    public function images(){
        return $this->hasMany(Image::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }
}
