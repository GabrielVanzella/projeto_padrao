<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'birth_date',
        'sex',
        'nationality',
        'cpf',
        'passaporte',
        'rg',
        'zip_code',
        'address',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'email',
        'password',
        'cellphone',
    ];
}
