<?php

namespace App\Api\V1\Modules\Authorization\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    /**
     * The table associated with this model
     * @var string
     */
    protected $table = 'permissions';

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
