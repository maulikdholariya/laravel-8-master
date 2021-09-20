<div class="form-group">
    <label for="title">Title</label>
    <input id="title" type="text" name="title" class="form-control"  value="{{ old('title', optional($post ?? null)->title) }}" >
</div>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="content" name="content" class="form-control"cols="30" rows="10">{{ old('content', optional($post ?? null)->content) }}</textarea>
    </div>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    {{--  @errors

    @enderrors  --}}

    {{--  @if($errors->any())
        <div>
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif  --}}
