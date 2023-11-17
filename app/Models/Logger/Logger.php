<?php

namespace App\Models\Logger;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'message',
      ];

}
