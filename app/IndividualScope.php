<?php
/**
 * Created by PhpStorm.
 * User: ПК
 * Date: 3/7/2019
 * Time: 11:59 AM
 */
namespace App;

use \Illuminate\Database\Eloquent\Scope;
use \Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Model;


class IndividualScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $model = User::class;
        $builder->where('role','individual');
    }

}