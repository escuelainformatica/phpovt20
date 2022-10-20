<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaGrande extends Model
{
    use HasFactory;
    public $table='tablagrande';

    public $fillable=['texto','numero'];
}
