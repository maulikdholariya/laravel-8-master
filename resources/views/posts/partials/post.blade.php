
<h3>{{ $post->title }}</h3>


<div>
<a href="{{ route('posts.edit',['post'=> $post->id]) }}" class="btn btn-primary"></a>
    <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete!" class="btn btn-danger">
    </form>
</div>
