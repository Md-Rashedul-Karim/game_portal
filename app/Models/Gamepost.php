<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamepost extends Model
{
    use HasFactory;

    protected $table = 'gameposts';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'game_title',
        'game_content',
        'game_image',
        'game_url',
        'game_banner',
        'game_platform',
        'game_status',
        'game_publish_at',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'game_publish_at' => 'datetime',
    ];

    public function user()
        {
            return $this->belongsTo(User::class);
        }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
