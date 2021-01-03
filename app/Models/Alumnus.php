<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alumni';

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
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'batch', 'current_involvement', 'description', 'image_path'];


}
