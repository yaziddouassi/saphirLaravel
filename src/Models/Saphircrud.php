<?php

namespace Saphir\Saphir\Models;

use Illuminate\Database\Eloquent\Model;

class Saphircrud extends Model
{

    protected $fillable = [
        'model',
        'label',
        'route',
        'icon',
        'active',
    ];
    
}