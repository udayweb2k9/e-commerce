@extends('layouts.app_inner')
@section('page_title', 'About')
@section('content')
<form method="post" action="{{url('addabout')}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Carcompany">Page Title:</label>
            <input type="text" class="form-control" name="carcompany">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Model">Page Content:</label>
            <input type="text" class="form-control" name="model">
          </div>
        </div>
       
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
@endsection

