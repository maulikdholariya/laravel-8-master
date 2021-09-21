<div class="mb-2 mt-2">
    @auth
    <form method="POST" action="{{ $route }}">
        @csrf
        <div class="form-group">
            <textarea id="content" name="content" class="form-control"cols="3" rows="2"></textarea>
        </div>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div><input type="submit" value="Create" class="btn btn-primary btn-block">Add comment</div>
    </form>
    @else
        <a href="{{ route('login') }}">Sign-in</a> to post comments!
    @endauth
    <hr>
    </div>
