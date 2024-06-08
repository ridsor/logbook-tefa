<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Logbook extends Model
{
    use HasFactory;
    use HasUuids;
    
    protected $guarded = ['id'];
    protected $table = 'logbook';
    public $timestamps = false;
}
