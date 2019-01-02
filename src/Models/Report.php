<?php

/*
 * This file is part of the Dotenv Report package.
 *
 * (c) Tiago Perrelli <tiagoyg@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DotEnv\Report\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    /**
     * Object attributes
     *
     * @var array
     */
    protected $attributes = [
        'title', 'description', 'configuration', 'table', 'type' , 'order'
    ];

    /**
     * Date fields
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Casteable variables
     *
     * @var array
     */
    protected $casts = [
        'configuration' => 'collection'
    ];
}