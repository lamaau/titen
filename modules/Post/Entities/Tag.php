<?php

namespace Modules\Post\Entities;

use App\Models\Relations\HasAuthor;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasUuid,
        HasAuthor,
        HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'description',
    ];

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\TagFactory::new();
    }
}
