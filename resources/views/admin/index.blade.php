@extends('admin.layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
  .hidden-form {
      display: None;
  }
  .description-tooltip {
      display: inline-block;
      position: relative;
  }

  .description-tooltip::after {
      content: attr(data-tooltip);
      position: absolute;
      left: 0;
      bottom: 100%;
      background: black;
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
      visibility: hidden;
  }

  .description-tooltip:hover::after {
      visibility: visible;
  }

  .description-tooltip {
      white-space: nowrap;
      width: 150px;
      overflow: hidden;
      text-overflow: ellipsis;
  }
</style>
<script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
<div class="push-top">
    <div class="row">

        <div class="col-6">
            <form class="btn-lg" action="{{ route('search') }}" method="GET">
                <input type="text" name="search">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="col-6 text-end">
            <a href="{{ route('dashboard.create')}}" class="btn btn-primary btn-lg">Create</a>
        </div>

    </div>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
  <table class="table push-top">
    <thead>
        <tr class="table table-striped" style="background-color: #BED7DC;">
          <td>ID</td>
          <td>Product Name</td>
          <td>Description</td>
          <td>Author</td>
          <td>Price</td>
          <td>Image</td>
          <td>created_at</td>
          <td>updated_at</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($legos as $item)
        <tr data-id="{{$item->id}}">
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>
                {{$item->description}}
            </td>
            <td>{{$item->author}}</td>
            <td>{{$item->price}}</td>
            <td><img src="{{ asset('storage/images/' . $item->image_url) }}" alt="Product Image" width="240px" height="200px"></td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            <td class="text-center">
                <a href="{{ route('dashboard.edit', $item->id)}}" class="btn btn-primary btn-sm">Update</a>

                <form action="{{ route('dashboard.destroy', $item->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    <div class="col-6">
        <div class="card-body">
        </div>
        <div class="hidden-form">
        </div>

    </div>
<div>
@endsection
