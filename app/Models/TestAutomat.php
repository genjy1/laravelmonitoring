<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAutomat extends Model
{
    //
    protected $connection = 'second';

    protected $table = 'event';
}
