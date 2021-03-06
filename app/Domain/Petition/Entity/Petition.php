<?php

namespace App\Domain\Petition\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Profile\Entity\User;

class Petition extends Model
{
    // konfigurasi ORM
    use HasFactory;
    protected $table = 'petition';
    protected $guarded = ['id'];

    // Relasi
    // public function participatepetition()
    // {
    //     return $this->hasMany(ParticipatePetition::class ,'id','idPetition');
    // }

    public function updatenews()
    {
        return $this->hasMany(UpdateNews::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'idCampaigner');
    }
}
