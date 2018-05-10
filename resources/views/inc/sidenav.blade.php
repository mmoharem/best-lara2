<div class="container">
        <div class="row">
            
            @if(Auth::check())
            <div class="col-lg-4">
    
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('users')}}">User</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('posts')}}">Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tags')}}">Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.viewtrash')}}">Trash Box</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('category.index')}}">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('create.user')}}">Create new user</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('category.create')}}">Create new category</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tag.create')}}">Add new tag</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.create')}}">Create new post</a>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="col-lg-8">
                
                @yield('content')
    
            </div>
        </div>
    </div>