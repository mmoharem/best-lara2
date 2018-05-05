@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            
            <h2>Tags</h2>
            <br>
        </div>
            <table class="table table-hover">
                    <thead>
                        <th>
                            Tag name
                        </th>
                        <th>
                            Editing
                        </th>
                        <th>
                            Deleting
                        </th>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>
                                    {{$tag->tag}}
                                </td>
                                <td>
                                    <a href="{{route('tag.edit', ['id'=>$tag->id])}}" class="btn btn-default">Edit</a>
                                </td>
                                <td>
                                    <a href="{{route('tag.delete', ['id'=>$tag->id])}}" class="btn btn-danger">X</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
    
    
@endsection