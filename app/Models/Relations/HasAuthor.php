<?php

declare(strict_types=1);

namespace App\Models\Relations;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAuthor
{
    public function getFillable(): array
    {
        return array_merge($this->fillable, [
            'created_by',
            'updated_by',
            'deleted_by',
        ]);
    }

    public static function bootHasAuthor(): void
    {
        static::creating(function (Model $model) {
            $model->fill(['created_by' => user()->id]);
        });

        static::updating(function (Model $model) {
            $model->fill(['updated_by' => user()->id]);
        });

        static::deleting(function (Model $model) {
            $model->update(['deleted_by' => user()->id]);
        });
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
