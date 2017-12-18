@extends('admin.layout.master')
@section('style')
    {{ HTML::style('bower/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
@endsection

@section('content')
    <div class="content-wrapper" >
        <section class="content-header">
            <h1>
                MANAGE ORDER
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">manage</a></li>
                <li class="active">manage user</li>
            </ol>
        </section>
        <section class="content" id="manage_order">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center weight-title">User Name</th>
                                    <th class="text-center weight-title">Time</th>
                                    <th class="text-center weight-title">Order Quantity</th>
                                    <th class="text-center weight-title">Total</th>
                                    <th class="text-center weight-title">Status</th>
                                    <th class="text-center weight-title">Action</th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                @foreach($orders as $order)
                                <tr>
                                    <td class="text-center">{{$order->name}}</td>
                                    <td class="text-center">{{$order->created_at}}</td>
                                    <td class="text-center">{{$order->product_count}}</td>
                                    <td class="text-center">${{$order->sum}}</td>
                                    <td class="text-center">
                                        @if($order->status == "inprogress" )
                                            <div class="btn btn-info" style="width: 120px">{{$order->status}}</div>
                                        @elseif($order->status == "waiting")
                                            <div class="btn btn-warning" style="width: 120px" >{{$order->status}}</div>
                                        @elseif($order->status == "completed")
                                            <div class="btn btn-success" style="width: 120px" >{{$order->status}}</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" 
                                        @click="show_detail_order({{$order->id}})">
                                        <i class="fa fa-pencil-square-o fa-2x " aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    </td>
                                </tr>
                                 @endforeach
                                </tbody>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="show_detail_order" class="modal fade" role="dialog">
                <div class="modal-dialog order">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" type="button">x</button>
                            <h4 class="modal-title">order detail</h4>
                        </div>
                        <div class="modal-body" id="result" style="padding: 0 15px 15px 15px !important;"><div class="cart" id="cart">
                            <div class="row">
                                <div class="col-md-6 text-center">Status : </div>
                                <div class="col-md-6 text-right">
                                <form method="POST" action="{{route('change_status')}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="" name="id" v-model ="id" class="id_status">
                                    <select name = "status" class="status" >
                                        <option value="waiting" v-if="status == 'inprogress' || status == 'waiting'   "  style="background-color:yellow">waiting</option>
                                        <option value="inprogress"  v-if="status == 'inprogress'" >inprogress</option>
                                        <option value="complete" style="background-color:green">complete</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Check</button>
                                </form>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <tbody>
                                    <tr v-for="order_detail in order_details">
                                        <td class="col-sm-8 col-md-6 text-center">
                                            <div class="media">
                                                <a v-bind:href="'../product/'+order_detail.product_id"> <img class="media-object" v-bind:src="url + order_detail.avatar">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a v-bind:href="'../product/'+order_detail.product_id">@{{order_detail.name}}</a>
                                                    </h4>
                                                    <h5 class="media-heading"> Type : <a href="../menu">@{{order_detail.category}}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center" style="padding-top: 62px">
                                            <span class="price">$@{{order_detail.price}}</span>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center" style="padding-top: 62px" style="font-size: 1.3em !important;">
                                            <span class="price">@{{order_detail.quantity}}</span>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center" style="padding-top: 62px" style="font-weight: bold !important;">
                                            $<span id="amount" class="amount">@{{order_detail.quantity*order_detail.price}}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
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
            $('#example1').DataTable();
        });
    </script>
    {{ HTML::script('js/admin/manage_order.js') }}
@endsection
