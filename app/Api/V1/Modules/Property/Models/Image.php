<?php

namespace App\Api\V1\Modules\Property\Models;

use App\DataminingOption;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The table associated with this model
     * @var string
     */
    protected $table = 'images';

    /**
     * An Image Model belongs to a single DataminingOption Model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datamining_option(){
        return $this->belongsTo(DataminingOption::class);
    }
}
