<?php

namespace Modules\Post\Entities;

use App\Models\Relations\HasAuthor;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasUuid,
        HasAuthor,
        HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'slug',
    ];

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostFactory::new();
    }
}
