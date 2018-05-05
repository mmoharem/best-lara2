@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update Category  <strong>{{$category->name}}</strong>
        </div>
        <div class="panel-body">
            <form action="{{route('category.update', ['id' => $category->id])}}" method="post">
                    {{csrf_field()}}
                <div class="form-group">
                    {{-- <label for="update">Update {{$category->name}}</label> --}}
                    <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Update new category">
                </div>
                <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">
                                Save Post
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection