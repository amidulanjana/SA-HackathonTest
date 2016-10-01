<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amila extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'amila';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'address',
        'phone',
    ];
}
