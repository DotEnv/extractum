<?php

/*
* This file is part of the Dotenv Report package.
*
* (c) Tiago Perrelli <tiagoyg@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace DotEnv\Report\Repositories;

use DotEnv\Report\Models\Report;
use DotEnv\Report\Repositories\BaseRepository;
use DotEnv\Report\Contracts\ReportRepository as ReportRepositoryContract;

class ReportRepository extends BaseRepository implements ReportRepositoryContract
{
    protected $model = Report::class;

    public function allByType($type = 'Line')
    {
        $query = $this->newQuery();
        
        $query->where('type', '=', 'Line');

        return $query->get();
    }
    
    public function allByOrder($order = 0)
    {
        $query = $this->newQuery();
        
        $query->orderBy('order', '=', 'ASC');

        return $query->get();
    }

    public function getTypes()
    {
        return [
            'Line', 'Chart', 'Pie', 'Bar'
        ];
    }
}