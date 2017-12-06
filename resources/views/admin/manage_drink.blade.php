@extends('admin.layout.master')
@section('style')
    {{ HTML::style('bower/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
@endsection

@section('content')
    <div class="content-wrapper" >
        <section class="content-header">
            <h1>
                MANAGE drink
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">manage</a></li>
                <li class="active">manage drink</li>
            </ol>
        </section>
        <section class="content" id="manage_drink">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All drink</h3>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="table_drink">ID</th>
                                        <th >Avatar</th>
                                        <th class="table_drink">Price</th>
                                        <th class="table_drink">Status</th>
                                        <th class="table_drink">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="drink in drinks">
                                        <td class="table_drink">@{{ drink.id }}</td>
                                        <td><img v-bind:src="url+drink.avatar" class="fix-img">
                                        @{{ drink.name }}
                                        </td>
                                        <td class="table_drink">@{{ drink.price }}</td>
                                        <td class="table_drink">@{{drink.status }}</td>
                                        <td class="table_drink">
                                        <a href="">
                                            <i class="fa fa-pencil-square-o fa-2x " aria-hidden="true"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                                        </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Avatar</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    {{ HTML::script('bower/datatables.net/js/jquery.dataTables.min.js') }}
    {{ HTML::script('bower/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
    {{ HTML::script('bower/fastclick/lib/fastclick.js') }}
    <script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
    })
    </script>
    {{ HTML::script('js/admin/manage_drink.js') }}
@endsection
