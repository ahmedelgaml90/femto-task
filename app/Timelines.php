<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelines extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'timelines';
    protected $fillable = array('name','desc','photo','date','year');
    public $timestamps = false;
 
 
  
    public function setPhotoAttribute($photo) {
        if ($photo) {
            $dest = 'admin-assets/images/services/';
            $name = str_random(6) . '_' . $photo->getClientOriginalName();
            $photo->move($dest, $name);
            $this->attributes['photo'] = $name;
        }
    }
 
 
 
}
