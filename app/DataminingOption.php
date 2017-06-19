<?php

namespace App;

use App\Api\V1\Modules\Property\Models\Image;
use Illuminate\Database\Eloquent\Model;

class DataminingOption extends Model
{
    /**
     * The table associated with this model
     * @var string
     */
    protected $table = 'datamining_options';

    /**
     * A DataminingOption Model has many Image Models
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(){
        return $this->hasMany(Image::class);
    }

}
