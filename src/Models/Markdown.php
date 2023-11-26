<?php

namespace Kenura\Mardock\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markdown extends Model
{
    use HasFactory;

    protected $table = 'markdowns';

    protected $fillable = [
        "name",
        "file_location",
    ];
}
