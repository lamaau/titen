<?php

namespace App\Models\Setting;

use Database\Factories\Setting\PermissionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermissionModel;

class Permission extends SpatiePermissionModel
{
    use HasFactory;

    protected static function newFactory(): PermissionFactory
    {
        return PermissionFactory::new();
    }
}
