<div class="container">
        <div class="row">
            
            @if(Auth::check())
            <div class="col-lg-4">
    
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{route('users')}}">User</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('create.user')}}">Create new user</a>
                            </li>
                        @endif
                        <ul class="list-group">
                            <h3>Posts</h3>
                        <li class="list-group-item">
                            <a href="{{route('posts')}}">Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.create')}}">Create new post</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.viewtrash')}}">Trash Box</a>
                        </li>
                        </ul>
                        <li class="list-group-item">
                            <a href="{{route('user.profile')}}">My profile</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tags')}}">Tags</a>
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
                        @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{route('settings')}}">Post Settings</a>
                            </li>
                        @endif
                        
                    </ul>
                </div>
            @endif
            <div class="col-lg-8">
                
                @yield('content')
    
            </div>
        </div>
    </div>