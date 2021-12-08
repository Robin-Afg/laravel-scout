@extends('layouts.app')
<style>
    .text-limit {
        overflow:hidden; 
        white-space:nowrap; 
        text-overflow:ellipsis; 
        max-width:800px;
    }
    .text-limit-title {
        overflow:hidden; 
        white-space:nowrap; 
        text-overflow:ellipsis; 
        max-width:200px;
    }
</style>

@section('content')
<div class="container">
<a href="{{route('posts.create')}}" class="btn btn-sm btn-primary mb-4">Create Post</a>
    <div class="row justify-content-center">
    
        <div class="row">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-warning">Visit</a> 
                        </th>
                        <td class="text-limit-title">{{$post->title}}</td>
                        <td class="text-limit">{{$post->description}}</td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
</div>           
@endsection

