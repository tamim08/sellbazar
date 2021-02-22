@extends('seller.master')

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
                <div class="card-header">
                    <h3 class="card-title">Update seller information</h3>
                  </div>
                <form method='POST' action='{{route('save_data')}}'>
                @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Your name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFacebook">Facebook URL</label>
                        <input type="text" name="facebook" class="form-control" id="exampleInputFacebook" placeholder="Enter Your facebook_url">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputArea">Area</label>
                        <select name="area_id" id="exampleInputArea" class="form-control">
                            @foreach ( $areas as $area )
                                <option value="">Select Area</option>
                                <option value="{{$area->id}}">{{$area->name }}</option>
                            @endforeach

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputaddress">Address</label>
                        <textarea class="form-control" name="address" id="" cols="30" rows="5"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputcategory">Supplier Category</label>
                        <select name="supplier_category_id" id="exampleInputcategory" class="form-control">
                            @foreach ( $supplier_categories as $supplier_category )
                            <option value="">Select Supplier_category</option>
                            <option value="{{ $supplier_category->id}}">{{ $supplier_category->name }}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputin">Inside Dhaka Charge</label>
                        <input type="number" name="inside_dhaka_charge" class="form-control" id="exampleInputin" placeholder="Inside dhaka charge">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputout">Outside Dhaka Charge</label>
                        <input name='outside_dhaka_charge' type="number" class="form-control" id="exampleInputout" placeholder="Outside dhaka charge">
                      </div>
                    <div class='form-group'>
                      <input id="" class="btn btn-primary" type="submit" value='Submit'>
                    </div>
                    
                  </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
