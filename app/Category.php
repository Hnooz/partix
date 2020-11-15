<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
    protected $table = 'categories';
    public function part()
   {
       return $this->hasMany('App\Part');
   }

}
