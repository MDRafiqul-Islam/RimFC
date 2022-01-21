<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function fixture()
    {
        return $this->belongsTo(Fixture::class,'fixture_id','id');
    }
    public function venu()
    {
        return $this->belongsTo(Venu::class,'venu_id','id');
    }
}
