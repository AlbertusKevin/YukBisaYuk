<?php

namespace App\Domain\Communication\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    public $timestamps = false;
    protected $fillable = ['message', 'user_id'];

    public function user()
    {
        return $this->belongsTo('\App\Domain\Event\Entity\User');
    }
}
