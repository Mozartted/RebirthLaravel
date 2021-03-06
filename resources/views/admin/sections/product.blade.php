@extends('admin.layouts.master')

@section('content')
    <div id="page-wrapper">
        @include('admin.sections.partials.users_header',['header'=>'Products'])
        <div class="page-content">
            <div id="tab-general">
                <div class="row mbl">
                    <div class="col-lg-12">

                        <div class="col-md-12">
                            <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                            </div>
                        </div>

                    </div>
                    <ul id="generalTab" class="nav nav-tabs responsive">
                        <li class="active"><a href="#alert-tab" data-toggle="tab">Products</a></li>
                        @if(Auth::user()->usergroup->name=='Admin')
                            <li><a href="#note-tab" data-toggle="tab">Add Product</a></li>
                        @endif


                    </ul>
                    <div id="generalTabContent" class="tab-content responsive">
                        <div id="alert-tab" class="tab-pane fade in active">
                            <div class="row">
                                <div class="panel panel-green">
                                    <div class="panel-heading">Product</div>
                                    <div class="panel-body">
                                        <!--Displays the users and their levels Admin or writer-->

                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Products</th>
                                                <th>Price</th>
                                                <th>sizes</th>
                                                @if(Auth::user()->usergroup->name=='Admin')
                                                    <th>Edit/Delete</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @foreach($products as $product)

                                                <tr>
                                                    <td>{!! $product->id !!}</td>
                                                    <td>{!! $product->name !!}</td>
                                                    @if(isset($product->price->amount))
                                                        <td><span class="label label-sm label-success">{!! $product->price->amount !!}</span></td>

                                                        @else
                                                        <td><span class="label label-sm label-success">Edit the price please</span></td>
                                                    @endif
                                                    <td>
                                                    @foreach($product->size as $pro)
                                                        {!! $pro->name !!}<p>Inches</p><br>
                                                    @endforeach
                                                        </td>

                                                    @if(Auth::user()->usergroup->name=='Admin')
                                                        <td><a href="{{url('administrator/product/'.$product->id.'/edit')}}">Edit</a> | {!! Form::open(['method' => 'DELETE', 'route' => ['product.delete', $product->id]]) !!}
                                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                            {!! Form::close()  !!}</td>
                                                    @endif
                                                </tr>


                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->usergroup->name=="Admin")
                        <div id="note-tab" class="tab-pane fade">
                            <div class="row">
                                <div class="panel panel-orange">
                                    <div class="panel-heading">
                                        Create A Product</div>
                                    <div class="panel-body pan">
                                        {!! Form::open(['route'=>'new_product']) !!}
                                        <div class="form-body pal">
                                            <div class="form-group">
                                                <div class="input-icon right">
                                                    <i class="fa fa-user"></i>
                                                    {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Product\'s name'])!!}</div>
                                            </div>

                                            {!! Form::label('price_id', 'Price') !!}
                                            <div class="form-controls">
                                                {!! Form::select('price_id', $price, null, ['class' =>
                                                'form-control']) !!}
                                            </div>

                                            <div class="form-controls">
                                                @foreach ($sizes as $size)
                                                    {!! Form::checkbox('id[]',$size->id) !!}
                                                    {!! Form::label('id', $size->name) !!} <br>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-actions text-right pal">
                                            {!!Form::submit('Submit', ['class' => 'btn btn-primary form-control'])!!}


                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
        <!--END CONTENT-->
        <!--BEGIN FOOTER-->
        @include('admin.sections.partials.footer')
    </div>
@endsection