@extends('admin.includes.admin_design')

@section('content')

<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Profile Settings</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                @include('admin.includes._message')
                <form method="post" action="{{ route('profileUpdate', $admin->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Name </label>
                                <input class="form-control" type="text" name="name" value="{{ $admin->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="form-control " type="email" value="{{$admin->email}}" name="email" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control " type="text" name="address" value="{{$admin->address}}">
                            </div>
                        </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" type="text" name="phone_number" value="{{$admin->phone_number}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Profile Image</label>
                                <input class="form-control" type="file" name="image" accept="image/*" onchange="readURL(this)">
                            </div>
                            <img width="150px" src="{{asset('/storage/uploads/'.$admin['image'])}}" id="one">
                        </div>

                    </div>


                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

</div>
@endsection

@section('js')
<script>
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#one").attr('src',e.target.result).width(150)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>


@endsection
