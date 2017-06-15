<?php

namespace App\Api\V1\Modules\Authorization\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    /**
     * The table associated with this model
     * @var string
     */
    protected $table = 'roles';

    /**
     * The fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];
}
