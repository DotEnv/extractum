@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">Create New Report
            </div>
            <div class="panel-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Erro ao realizar cadastro</strong>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </div>
                @endif            

                <form method="POST" action="{{ url(config('routes.route_name', 'reports')) }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Define the title" />
                    </div>

                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea rows="5" name="description" class="form-control" placeholder="Define the report description">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Table</label>
                        <select name="table" class="form-control">
                            <option value="">--SELECT--</option>
                            @foreach ($tables as $table)
                                <option value="{{ $table }}" @if(old('table') == $table): selected @endif>{{ $table }}</option>
                            @endforeach
                        </select>                        
                    </div>

                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <select name="type" class="form-control">
                            <option value="">--SELECT--</option>
                            @foreach ($types as $type)
                                <option value="{{ $type }}" @if(old('type') == $type): selected @endif>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Order</label>
                        <input type="number" name="order" value="{{ old('order') }}" class="form-control" placeholder="Define the order that your report will be rendered" />
                    </div>

                    <div class="form-group">
                        <hr>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection