<?php
/**
 * Created by PhpStorm.
 * User: ПК
 * Date: 3/7/2019
 * Time: 11:59 AM
 */
use \Illuminate\Database\Eloquent\Scope;
use \Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Model;



class BusinessScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('role', '==', 'business');
    }

}