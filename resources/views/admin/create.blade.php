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
    Create new
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
      <form method="post" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Product Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="author">Author</label>
              <input type="text" class="form-control" name="author"/>
          </div>

          <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" name="price"/>
          </div>

          <div class="form-group">
              <label for="price">Image</label>
              <input type="file" class="form-control" name="image_url"/>
          </div>
          <button type="submit" class="mt-4 form-control btn btn-block btn-danger">Create new</button>
      </form>
  </div>
</div>
@endsection
