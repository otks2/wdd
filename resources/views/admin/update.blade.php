@extends('admin.layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Edit & Update
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('dashboard.update', $legos->id) }}" >
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Product Name</label>
              <input type="text" class="form-control" name="name" value="{{ $legos->name }}"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="{{ $legos->description }}"/>
          </div>
          <div class="form-group">
              <label for="author">Author</label>
              <input type="text" class="form-control" name="author" value="{{ $legos->author }}"/>
          </div>

          <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" name="price" value="{{ $legos->price }}"/>
          </div>

          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection
