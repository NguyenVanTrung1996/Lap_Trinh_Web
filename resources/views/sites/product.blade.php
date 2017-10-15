{{ HTML::style('/bower/bootstrap/dist/css/bootstrap.css', ['rel' => 'stylesheet', 'type' => 'text/css']) }}
{{ HTML::style('/css/sites/product_detail.css', [ 'rel' => 'stylesheet', 'type' => 'text/css']) }}
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper">
                <div class="preview col-md-5">
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="http://lorempixel.com/300/300/animals/" /></div>
                        <div class="tab-pane" id="pic-2"><img src="http://lorempixel.com/300/300/animals/" /></div>
                        <div class="tab-pane" id="pic-3"><img src="http://lorempixel.com/300/300/animals/" /></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs" id="myTab">
                        <li class="active"><a href="#pic-1" data-target="#pic-1" data-toggle="tab">
                                <img src="http://lorempixel.com/200/126/animals/" /></a>
                        </li>
                        <li><a href="#pic-2" data-target="#pic-2" data-toggle="tab">
                                <img src="http://lorempixel.com/200/126/animals/" /></a>
                        </li>
                        <li><a href="#pic-3" data-target="#pic-3" data-toggle="tab">
                                <img src="http://lorempixel.com/200/126/animals/" /></a>
                        </li>
                    </ul>
                </div>
                <div class="details col-md-7">
                    <div class="row">
                        <h3 class="product-title">{!! $prd_detail->name !!}</h3>
                    </div>
                    <div class="row">
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                    </div>
                    <div class="row">
                        <p class="product-description">{!! $prd_detail->description !!}</p>
                    </div>
                    <div class="row">
                        <h4 class="price">current price: <span>{!! $prd_detail->price !!}</span><i class="fa fa-dollar"></i></h4>
                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    </div>
                    <div class="row">
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div>
        <h2>San pham tương tu</h2>
    </div>
</div>
