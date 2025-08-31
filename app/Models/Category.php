<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_name',
        'category_status',
    ];

    // এক Category এর অনেকগুলো Game থাকতে পারে
    public function gameposts()
    {
        return $this->hasMany(Gamepost::class);
    }




}
