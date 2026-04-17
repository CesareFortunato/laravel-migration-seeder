<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = [
    'azienda',
    'stazione_partenza',
    'stazione_arrivo',
    'orario_partenza',
    'orario_arrivo',
    'codice_treno',
    'totale_carrozze',
    'in_orario',
    'cancellato',
    'ritardo',
    'binario'
];
}
