@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Create a new Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('posts.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title ... " name="title" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Description ... " name="description" cols="8" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>           
@endsection

