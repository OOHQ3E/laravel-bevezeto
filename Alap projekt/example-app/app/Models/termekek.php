<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class termekek extends Model
{
    use HasFactory;
    protected $table = "termekek";
    protected $primaryKey = "id";
    protected $fillable = ["ar","tipus","megnevezes"];
    public $timestamps = true;
}
