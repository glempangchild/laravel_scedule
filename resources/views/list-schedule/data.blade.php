@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
     <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Schedule</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
    <div class="content mt-3">
            <div class="animated fadeIn">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>List Schedule</strong>
                        </div>
                        <div class="pull-right">
                        <a href="{{url('schedule/add')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <tr class="d-flex">
                                <th class="col-1">No.</th>
                                <th class="col-3">Title</th>
                                <th class="col-3">Schedule</th>
                                <th class="col-3">Url</th>
                                <th class="col-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedule as $item)
                                    <tr class="d-flex">
                                    <td class="col-1">{{$loop->iteration}}</td>
                                    <td class="col-3">{{$item->title}}</td>
                                    <td class="col-3">{{$item->schedule}}</td>
                                    <td class="col-3">{{$item->action}}</td>
                                    <td class="text-center col-2">
                                    <a href="{{url ('schedule/edit/'.$item->id_schedule)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    <form action="{{url('schedule/'. $item->id_schedule)}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                     </table>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection
