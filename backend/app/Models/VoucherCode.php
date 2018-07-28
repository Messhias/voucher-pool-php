<?php

/**
* MODEL CLASS
*
* @author 	Fabio William Conceição
* @copyright	Fabio William 2017-07-27
* @version	1
* @since  	2017-07-27
* @package	Voucher Pool
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherCode extends Model
{

    /**
    * set model table
    *
    * @var protected $table
    **/
    protected $table = 'vouchers_codes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'discount_percentage',
        'code',
        'expiration_date'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
