@extends('layouts.app')

@section('content')

<h1>Author Post Details</h1>

<h3>Name: {{ $post->name }}</h3>
<h3>Category: {{ $post->category->name }}</h3>

<h3>Tags:
    @forelse ($post->tags as $tag)
    {{ $tag->name }}
    @empty
        -
    @endforelse
</h3>


<h3>Location: {{ $post->location }}</h3>
<h3>Email: {{ $post->email }}</h3>
<h3>ID Post: {{ $post->id }}</h3>

<a class="btn btn-primary" href="{{ route('admin.posts.index') }}">BACK</a>

@endsection
