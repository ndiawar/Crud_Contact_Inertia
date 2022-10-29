<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'Contacts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name' ,
        'name' ,
        'tel'
    ];
}
