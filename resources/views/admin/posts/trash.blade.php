{{-- Post Index --}}
@extends('layouts.app')

@section('content')

    @if($posts->count() > 0)
        @foreach($posts as $post)

        <div class="jumbotron">
                <h2 class="display-4">{{$post->title}}</h2>
                <p class="lead">{{$post->content}}</p>
                <hr class="my-4">
                {{-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> --}}
                <img src="{{$post->featured}}" alt="featured-image" class="img-fluid post__index--img">
                <a class="btn btn-success post__index--link" href="{{route('post.restore', ['id' => $post->id])}}" role="button">Restore</a>
                <a class="btn btn-danger post__index--link" href="{{route('post.delete', ['id' => $post->id])}}" role="button">Delete</a>
                {{-- <a class="btn btn-primary post__index--link" href="#" role="button">Delete</a> --}}
            </div>

        @endforeach
    @else
            <tr>
                <th colspan="5" class="text-center">
                    Trash Box is empty
                </th>
            </tr>
    @endif
@endsection