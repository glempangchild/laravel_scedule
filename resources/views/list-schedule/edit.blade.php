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
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Edit Schedule</strong>
                        </div>
                        <div class="pull-right">
                        <a href="{{url('/schedule')}}" class="btn btn-secondary btn-sm"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 offset-md-4"> 
                            <form action="{{url('schedule/'. $schedule->id_schedule)}}" method="POST">
                                @method('patch')
                                @csrf
                                    <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $schedule->title) }}" id="" placeholder="Enter Title" autofocus>
                                    @error('title')
                                        <div class="invalid-feedback">
                                        {{$message}}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                    <label for="">Schedule</label>
                                    <input type="text" name="schedule" class="form-control @error('schedule') is-invalid @enderror" id="" value="{{ old('schedule', $schedule->schedule) }}" placeholder="Enter Schedule">
                                    @error('schedule')
                                        <div class="invalid-feedback">
                                        {{$message}}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                    <label for="">Url</label>
                                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="" value="{{ old('url', $schedule->action)}}" placeholder="Enter Url">
                                    @error('url')
                                        <div class="invalid-feedback">
                                        {{$message}}
                                        </div>
                                    @enderror
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-sm">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection
