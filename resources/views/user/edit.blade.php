@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Edit a User') }} </div>
                <div class="card-body">
                    <!-- form to edit a post -->
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="lorem ipsum doler" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="lorem ipsum doler" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="text-end"> <!-- Add this wrapper to align the button -->
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection