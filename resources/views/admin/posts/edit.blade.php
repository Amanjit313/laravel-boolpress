@extends('layouts.app')

@section('content')

<h1>Author n°{{ $post->id }} Post Edit</h1>

@if ($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.posts.update', $post) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="col-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" id="name"
             name="name"
             value="{{ old('name', $post->name) }}"
             class="form-control @error('name') is-invalid @enderror"
             placeholder="Name...">
             @error('name')
                <p class="error-msg text-danger">{{ $message }}</p>
            @enderror
    </div>

    <br>
    <div class="col-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select @error('category_id') is-invalid @enderror"
                aria-label="Default select example"
                name="category_id"
                id="category">
                <option>Select the category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if ( old('category_id', $post->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
        </select>
        @error('category_id')
            <p class="error-msg text-danger">{{ $message }}</p>
        @enderror
    </div>
    <br>

    <div class="col-3">
        <label class="form-label">Tags</label>
        @foreach ($tags as $tag)
        <br>
        <input  class="form-select @error('tag_id') is-invalid @enderror"
                aria-label="Default select example"
                name="tags[]"
                id="tag{{ $loop->iteration }}"
                type="checkbox"
                value="{{ $tag->id }}"
                @if(!$errors->any() && $post->tags->contains($tag->id))
                checked
                @elseif ($errors->any() && in_array($tag->id, old('tags',[])))
                @endif>
                <label for="tag{{ $loop->iteration }}">
                    {{ $tag->name }}
                </label>
                <br>
        @endforeach
        @error('tag_id')
            <p class="error-msg text-danger">{{ $message }}</p>
        @enderror
    </div>
    <br>

    <div class="col-3">
      <label for="location" class="form-label">Location</label>
      <input type="text" id="location"
             name="location"
             value="{{ old('location', $post->location) }}"
             class="form-control @error('location') is-invalid @enderror"
             placeholder="Location...">
             @error('location')
                <p class="error-msg text-danger">{{ $message }}</p>
            @enderror
    </div>

    <div class="col-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email"
             name="email"
             value="{{ old('email', $post->email) }}"
             class="form-control @error('email') is-invalid @enderror"
             placeholder="Email...">
             @error('email')
                <p class="error-msg text-danger">{{ $message }}</p>
            @enderror
    </div>

    <br>
    <button type="submit" class="btn btn-success">EDIT</button>
    <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">BACK</a>

  </form>

@endsection
