<?php

/*
 * This file is part of the Dotenv Report package.
 *
 * (c) Tiago Perrelli <tiagoyg@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DotEnv\Report\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Validator;
use DotEnv\Report\Contracts\ReportRepository;

class ReportController extends Controller
{
    /**
     * Report repository
     *
     * @var ReportRepository
     */
    protected $repository;

    /**
     * Class constructor
     *
     * @param ReportRepository $repository
     */
    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display an application resource
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    { 
        $reports = $this->repository->getAll();
    
        return view('report::reports.index', compact('reports'));
    }

    /**
     * Create an application resource
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $types  = $this->repository->getTypes();
        $tables = [
            'users', 
        ];

        return view('report::reports.create', compact('types', 'tables'));
    }

    /**
     * Store an application resource
     *
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Http\Response;
     */    
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        dd('asd', $request->all());

        $this->repository->create($request->all());
    }

    /**
     * Edit an application resource
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $report = $this->repository->findByID($id);
        $types  = $this->repository->getTypes();

        return view('report::reports.edit', compact('report', 'types'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'title'         => 'required|max:100',
            'description'   => 'required|max:500',
            'configuration' => 'required',
            'table'         => 'required|max:50',
            'type'          => 'required|in:Line,Chart,Bar,Pie',
        ];
        
        return Validator::make($data, $rules);
    }
}