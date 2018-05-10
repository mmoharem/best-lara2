@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            
            <h2>Users</h2>
            <br>
        </div>
            <table class="table table-hover">
                    <thead>
                        <th>
                            Image
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Permissions
                        </th>
                        <th>
                            Delete
                        </th>
                    </thead>
                    <tbody>
                        @if($users->count() > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{asset($user->profile->avatar)}}" class="user-avatar" alt="">
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        @if($user->admin)
                                            admin
                                        @else
                                            <a href="{{route('user.admin')}}" class="btn btn-xs btn-success">Permit admin</a>
                                        @endif
                                    </td>
                                    <td>
                                        Delete
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="5" class="text-center">No Users found</th>        
                            </tr>
                        @endif
                    </tbody>
                </table>
    </div>
    
    
@endsection