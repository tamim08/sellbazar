@extends('admin.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{URL::to('/')}}/{{$action}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        Add {{$name}}
                    </div>
                    <div class="card-body">
                       @foreach($fields as $field)
                        @if($field["type"]=="text")
                        <div class="form-group">
                                <label for="exampleInputEmail1">{{$field['label']}}</label>
                                <input @if($field["required"])
required
@endif
 name="{{$field['name']}}" type="text" class="form-control" 
                                    >
                            </div>
                            @elseif($field["type"]=="date")
                        <div class="form-group">
                                <label for="exampleInputEmail1">{{$field['label']}}</label>
                                <input @if($field["required"])
                                    required
                                    @endif
                                    name="{{$field['name']}}" type="date" class="form-control">
                            </div>
                             @elseif($field["type"]=="number")
                        <div class="form-group">
                                <label for="exampleInputEmail1">{{$field['label']}}</label>
                                <input @if($field["required"])
                                    required
                                    @endif
                                    name="{{$field['name']}}" type="number" class="form-control">
                            </div>
                        @elseif($field["type"]=="textarea")
                        <div class="form-group">
                                <label for="exampleInputEmail1">{{$field['label']}}</label>
                                <textarea name="{{$field['name']}}" class="textarea"></textarea>
                                
                            </div>
                        @elseif($field["type"]=="select")
                        <div class="form-group">
                                <label for="exampleInputEmail1">{{$field['label']}}</label>
                                <select @if($field["required"])
                                required
                                @endif
                                 name="{{$field['name']}}"  class="form-control" >
                                            @foreach($field["options"] as $option)
                                                <option value="{{$option['id']}}">
                                                    {{$option[$field["optionlabel"]]}}
                                                </option>
                                            @endforeach
                                </select>
                                
                            </div>
                        @elseif($field["type"]=="radio")
                        <div class="form-group">
                                <label for="exampleInputEmail1">{{$field['label']}}</label>
                                <input @if($field["required"])
required
@endif
 name="{{$field['name']}}" type="text" class="form-control" 
                                    >
                            </div>
                        @elseif($field["type"]=="checkbox")
                        <div class="form-group">
                                <label for="exampleInputEmail1">{{$field['label']}}</label>
                                <input @if($field["required"])
required
@endif
 name="{{$field['name']}}" type="checkbox" 
                                    >
                            </div>
                            @elseif($field["type"]=="file")
                        <div class="form-group">
                                <label for="exampleInputEmail1">{{$field['label']}}</label>
                                <input @if($field["required"])
required
@endif
 name="{{$field['name']}}" type="file" class="form-control-file" 
                                    >
                            </div>
                        @endif

                            
                       @endforeach
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection