<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
/**
 * Description of Todo
 *
 * @author kacha.jaykishan
 */
class Todo extends Model
{
     use SoftDeletes;

    protected $table = 'todo';
    
    /* Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value', 'user_id', 'status', 'completed_time'
    ];
    
    /**
     * The attributes that are casts into their data-types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'string',
        'user_id' => 'integer',
    ];
    
    /**
     * The attributes with their default value.
     *
     * @var array
     */
    protected $attributes = [
        'value' => '',
        'user_id' => 0
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

}
