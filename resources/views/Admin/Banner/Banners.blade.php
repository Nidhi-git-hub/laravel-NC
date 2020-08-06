@extends('Admin.layouts.master')
@section('title','View Banners')
@section('content')



<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-eye"></i>
               </div>
               <div class="header-title">
                  <h1>Banners</h1>
                  <small>Banners</small>
               </div>
            </section>
            <!-- Main content -->
            @if(Session::has('flash_message_error'))
            <div class="alert alert-sm alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-sm alert-success alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
            @endif

            <div id="message_success" style="display: none;" class="alert alert-sm alert-success">Status Enabled</div>
            <div id="message_error" style="display: none;" class="alert alert-sm alert-danger">Status Disabled</div>
            
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Banners</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('admin/add-banner')}}"> <i class="fa fa-plus"></i> Add Banner
                                 </a>  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Head</th>
                                       <th>Sort Order</th>
                                       <th>Image</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                  @foreach($bannerDetails as $bannerDetail)
                                    <tr>
                                       <td>{{$bannerDetail->id}}</td>
                                       <td>{{$bannerDetail->name}}</td>
                                       <td>{{$bannerDetail->head}}</td>
                                       <td>{{$bannerDetail->sort_order}}</td>
                                       <td>@php if (!empty($bannerDetail->image))
                                           {
                                           @endphp
                                           <img src="{{url('/uploads/banner/'.$bannerDetail->image)}}" style="height: 150px; width: 150px" >
                                           @php 
                                           } else {
                                           @endphp 
                                           <p>No image found</p>
                                           @php
                                           }
                                           @endphp
                                       </td>
                                       <td>
                                          <input type="checkbox" class="BannerStatus btn btn-success" rel="{{$bannerDetail->id}}" data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"

                                          @if($bannerDetail['status']=="1")checked @endif>
                                          <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div>
                                       </td>
                                       <td>
                                          <a href="{{url('/admin/edit-banner/'.$bannerDetail->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                          <a href="{{url('/admin/delete-banner/'.$bannerDetail->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
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
            </section>
            <!-- /.content -->
         </div>

@endsection