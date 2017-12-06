@extends('admin.layout.master')
@section('style')
{{ HTML::style('bower/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
<script src="https://unpkg.com/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue2-filters/dist/vue2-filters.min.js"></script>
@endsection

@section('content')
<div class="content-wrapper" >
    <section class="content-header">
        <h1>
            MANAGE FOOD
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">manage</a></li>
            <li class="active">manage food</li>
        </ol>
    </section>
    <section class="content" id="manage_food">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <div class="btn btn-success" @click="show_create">CREATE</div>
                        </h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Avatar</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="food in foods">
                                    <td class="table_food">@{{ food.id }}</td>
                                    <td><img v-bind:src="url+food.avatar" class="fix-img">
                                        @{{ food.name }}
                                    </td>
                                    <td class="table_food">
                                    <span id="element">
                                        @{{ food.price | currency('',0)}}<sup><ins>đ</ins></sup>
                                    </span>
                                    </td>
                                    <td class="table_food">@{{ food.status }}</td>
                                    <td class="table_food">
                                        <a href="javascript:void(0)" @click="edit_food(food)">
                                            <i class="fa fa-pencil-square-o fa-2x " aria-hidden="true"></i>
                                        </a>
                                        <a href="javascript:void(0)" @click="confirm_delete(food)">
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
                                    <th class="table-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete_food_confirm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirm Delete Food</h4>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có muốn xóa <span style="color:red">@{{ item_food.name }}</span> không ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="delete_food(item_food.id)"
                        >Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="show_edit_food">
            <div class="modal-dialog fix-width-edit-food">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Edit <span class="edit_food"><i>@{{item_food.name }}</i></span> </h3>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="edit(item_food.id)">
                            <div class="form-group">
                                <label for="">Name :</label>
                                <input type="text" class="form-control" name="name" v-model="item_food.name">
                            </div>
                            <div class="form-group">
                                <label for="">Price :</label>
                                <input type="text" class="form-control" name="price" v-model="item_food.price" >
                            </div>
                            <div class="form-group">
                                <label for="">Description :</label>
                                <input type="text" class="form-control" name="description" v-model="item_food.description">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="show_create">
            <div class="modal-dialog fix-width-edit-food">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Create New Food</h3>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="create_food">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Name :</label>
                                <input type="text" class="form-control" name="name" v-model="new_food.name">
                            </div>
                            <div class="form-group">
                                <label for="">Price :</label>
                                <input type="text" class="form-control" name="price" v-model="new_food.price" >
                            </div>
                            <div class="form-group">
                                <label for="">Category :</label>
                                <input type="text" class="form-control" name="category" v-model="new_food.category" >
                            </div>
                            <div class="form-group">
                                <label for="">Description :</label>
                                <input type="text" class="form-control" name="description" v-model="new_food.description">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        });
    });
</script>
{{ HTML::script('js/admin/manage_food.js') }}
@endsection
