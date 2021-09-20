@extends('layouts.app')
@section('title',$post->title)


@section('content')
<div class="row">
    <div class="col-8">
            {{-- @if ($posts['is_new'])
            <div>A new blog posts! Using if</div>
            @endif

            @unless ($posts['is_new'])

            <div>A blog posts is Old </div>

            @endunless

        <h1>{{ $posts['title'] }}</h1>
        <p>{{ $posts['content'] }}</p>

        @isset($posts['has_comments'])

            <div>The post has some comments... using isset</div>

        @endisset --}}

        <h1>
            {{ $post->title }}
            @badge(['type' => 'primary','show'=>now()->diffInMinutes($post->created_at) < 5])
                Brand new Post!
            @endbadge
        </h1>
        <p>{{ $post->content }}</p>
        @updated(['date'=>$post->created_at, 'name'=> $post->user->name])
        @endupdated()
        @updated(['date'=>$post->updated_at,])
            updated
        @endupdated()
        @tags(['tags' => $post->tags])@endtags
        <p>Currently read by {{ $counter }} people</p>

        <h4>Comments</h4>
        @include('comments._form')
        @forelse ($post->comments as $comment )
        <p>
            {{ $comment->content }}
        </p>
        @updated(['date'=>$comment->created_at, 'name'=> $comment->user->name])
        @endupdated()

        @empty
        <p>No comments yet!</p>
        @endforelse
    </div>
    <div class="col-4">
        @include('posts._activity')
    </div>
</div>

@endsection
