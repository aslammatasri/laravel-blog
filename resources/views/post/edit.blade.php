@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Create a Post') }} </div>
                <div class="card-body">
                    <!-- form to edit a post -->
                    <form action="{{ route('posts.update', $posts->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Title</label>
                            <input type="title" class="form-control" id="title" name="title" placeholder="lorem ipsum doler" value="{{ old('title', $posts->title) }}">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $posts->content) }}</textarea>
                        </div>
                        <select class="form-select" aria-label="Status" name="status">
                            <option value="draft" {{ old('status', $posts->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $posts->status) == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        <div class="text-end mt-2"> <!-- Add this wrapper to align the button -->
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection