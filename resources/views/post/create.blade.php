@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Create a Post') }} </div>
                <div class="card-body">
                    <!-- form to create a post -->
                    <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Title</label>
                            <input type="title" class="form-control" id="title" name="title" placeholder="lorem ipsum doler">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        </div>
                        <select class="form-select mb-3" aria-label="Status" name="status">
                            <option selected>Status</option>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                        <div class="text-end"> <!-- Add this wrapper to align the button -->
                            <button type="submit" class="btn btn-primary">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection