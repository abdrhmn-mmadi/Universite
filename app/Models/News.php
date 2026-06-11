<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'image',
        'auteur_id',
        'date_publication',
        'statut',
    ];

    protected $casts = [
        'date_publication' => 'datetime',
    ];

    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }
}
