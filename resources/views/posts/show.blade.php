@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="display:flex; justify-content:space-between;">
                    <h3>{{$post->title}}</h3>
                    <form method="post" action="{{route('posts.destroy', $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger float-right">X</button>
                    </form>
                </div>
                <div class="card-body">
                    {{$post->description}}   
                </div>

            </div>
        </div>
    </div>
</div>           
@endsection

