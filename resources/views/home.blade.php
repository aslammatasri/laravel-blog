@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('List of Post') }}
                    <a class="btn btn-primary" type="button" href="{{ url('create') }}">Create Post</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @foreach( $posts as $post)
                    <div class="card mb-3" style="width: full;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{$post->content}}</p>
                            <a href="#" class="card-link">Read More</a>
                            <div class="">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                        Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div>{{ $posts->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection