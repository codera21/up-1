<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Code.
 *
 * @package namespace App\Models;
 */
class Code extends Model implements Transformable
{
   use TransformableTrait;



    /**

     * The database table used by the model.

     *

     * @var string

     */

    protected $table = 'codes';



    /**

     * Indicates if the model should be timestamped.

     *

     * @var bool

     */

    public $timestamps = true;



    /**

     * The attributes that should be mutated to dates.

     *

     * @var array

     */

    protected $dates      = ['created_at', 'updated_at'];

    

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [
		'code',
		'created_at',
		'updated_at'
	];

}
