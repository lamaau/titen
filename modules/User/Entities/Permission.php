<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Database\factories\PermissionFactory;
use Spatie\Permission\Models\Permission as SpatiePermissionModel;

class Permission extends SpatiePermissionModel
{
    use HasFactory;

    protected static function newFactory(): PermissionFactory
    {
        return PermissionFactory::new();
    }
}
