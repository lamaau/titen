<?php

namespace App\Models\Setting;

use App\Models\Relations\HasAuthor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRoleModel;

class Role extends SpatieRoleModel
{
    use HasAuthor,
        HasFactory;
}
