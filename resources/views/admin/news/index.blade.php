@extends('admin.includes.admin_design')
@section('title')
All News - {{ config('app.name', 'Laravel') }}
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">View All News</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All News </li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{route('news.add')}}" class="btn add-btn"><i class="fa fa-plus"></i>Add News</a>

                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Image</th>
                                        <th>News Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>View Count</th>
                                        <th>Status</th>
                                        <th>Updated As</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $data)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>
                                            <img width="150px" src="{{asset('/storage/uploads/'.$data['image'])}}">
                                        </td>
                                        <td>{{$data->news_title}}</td>
                                        <td>{{$data->admin->name}}</td>
                                        <td>{{$data->category->category_name}}</td>
                                        <td>{{$data->view_count}}</td>
                                        <td>
                                            @if ($data->status ==1)
                                            <span class="badge badge-pill badge-success">Published</span>
                                            @else

                                            <span class="badge badge-pill badge-danger">Draft</span>
                                            @endif
                                        </td>
                                        <td>{{$data->updated_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('news.edit',$data->id)}}" class="btn btn-info btn-sm"><i class="la la-edit"></i></a>
                                            <a href="javascript:" class="btn btn-danger btn-sm deleteRecord" rel="{{ $data->id }}" rel1="delete-news">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
<!-- Datatable JS -->
<script src="/adminpanel/assets/js/jquery.dataTables.min.js"></script>
<script src="/adminpanel/assets/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('body').on('click', '.deleteRecord', function (event) {
        event.preventDefault();
        var SITEURL = '{{ URL::to('') }}';
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
            title: "Are You Sure? ",
        text: "You will not be able to recover this record again",
        type: "warning",
        showCancelButton: true,
            confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Delete it!"
    },
        function () {
            window.location.href =  SITEURL + "/admin/" + deleteFunction + "/" + id;
        });
    });
</script>
@endsection
