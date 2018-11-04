<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';
    protected $fillable = array('name','address','email','tel');
    public $timestamps=false;
    
    public function employees()
    {
        return $this->hasMany('App\User', 'company_id');
    }
}
