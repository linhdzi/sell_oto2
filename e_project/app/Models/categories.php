<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name_list',
        'type',
        'link',
        'parent_id'
    ];
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
