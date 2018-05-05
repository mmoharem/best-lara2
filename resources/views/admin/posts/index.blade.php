{{-- Post Index --}}
@extends('layouts.app')

@section('content')

    
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Posts</h2>
        </div>
        @foreach($posts as $post)
            <div class="jumbotron">
                <h2 class="display-4">{{$post->title}}</h2>
                <p class="lead">{{$post->content}}</p>
                <hr class="my-4">
                {{-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> --}}
                <img src="{{$post->featured}}" alt="featured-image" class="img-fluid post__index--img">
                <a class="btn btn-danger post__index--link" href="{{route('post.trash', ['id' => $post->id])}}" role="button">Trash</a>
                <a class="btn btn-primary post__index--link" href="{{route('post.edit', ['id' => $post->id])}}" role="button">Edit</a>
            </div>
        @endforeach
    </div>
    

@endsection