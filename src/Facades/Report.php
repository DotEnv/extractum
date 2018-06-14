<?php

/*
 * This file is part of the Dotenv Report package.
 *
 * (c) Tiago Perrelli <tiagoyg@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DotEnv\Report\Facades;

use Illuminate\Support\Facades\Facade;

class Report extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'report';
    }
}