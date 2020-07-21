<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Permission\Models\Role as RoleModel;

class Role extends RoleModel
{
    /**
     * A model may have multiple roles.
     */
    public function users(): MorphToMany
    {
        return $this->morphToMany(
            User::class,
            'model',
            config('permission.table_names.model_has_roles'),
            config('permission.column_names.model_morph_key'),
            'role_id'
        );
    }
}
