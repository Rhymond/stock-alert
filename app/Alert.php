<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Alert extends Model
{
    const OPERATOR_LESS = 0;
    const OPERATOR_LESS_EQ = 1;
    const OPERATOR_EQUAL = 2;
    const OPERATOR_GREATER_EQ = 3;
    const OPERATOR_GREATER = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'symbol',
        'action',
        'operator',
        'value',
    ];


    public static function getOperatorsList()
    {
        return [
            self::OPERATOR_LESS => __('operators.less'),
            self::OPERATOR_LESS_EQ => __('operators.less_eq'),
            self::OPERATOR_EQUAL => __('operators.equal'),
            self::OPERATOR_GREATER_EQ => __('operators.greater_eq'),
            self::OPERATOR_GREATER => __('operators.greater'),
        ];
    }
}
