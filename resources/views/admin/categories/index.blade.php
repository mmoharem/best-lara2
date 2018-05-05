@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            
            <h2>Categories</h2>
            <br>
        </div>
            <table class="table table-hover">
                    <thead>
                        <th>
                            Category name
                        </th>
                        <th>
                            Editing
                        </th>
                        <th>
                            Deleting
                        </th>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    <a href="{{route('category.edit', ['id'=>$category->id])}}" class="btn btn-default">Edit</a>
                                </td>
                                <td>
                                    <a href="{{route('category.delete', ['id'=>$category->id])}}" class="btn btn-danger">X</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
    
    
@endsection