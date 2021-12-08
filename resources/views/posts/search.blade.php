@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search Posts</h1>

    <form action="{{ route('posts.search') }}" method="get">
        @csrf
        <div class="input-group">
            <input type="text" name="q" class="form-control input-lg" placeholder="Search for a post ..."
            value="{{old('q')}}" />
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary ">Search</button>
            </span>    
        <div>
    </form>
    <hr />
    @foreach($results as $post)
        <div class="row mt-4">
            <div class="col-md-8">
                <a href="{{ route('posts.show', $post->id) }}"><h3>{{$post->title}}</h3></a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        {{ $post->description }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection