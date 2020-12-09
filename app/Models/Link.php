<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['origin_url'];

    public function getShort(): string
    {
        return "/{$this->short_url}";
    }

    public function getOrigin()
    {
        return $this->origin_url;
    }
}
