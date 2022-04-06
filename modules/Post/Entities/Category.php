<?php

namespace Modules\Post\Entities;

use App\Models\Relations\HasAuthor;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasUuid,
        HasAuthor,
        HasFactory,
        SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
    ];

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\CategoryFactory::new();
    }
}
