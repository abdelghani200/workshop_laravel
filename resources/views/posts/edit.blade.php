<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Post</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="post_text">Post text:</label>
                                    <textarea name="post_text" class="form-control">{{ $post->post_text }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" class="form-control" placeholder="image">
                                    <img src="/images/{{ $post->image }}" width="300px">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category:</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($category->id == $post->category_id)>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
                                </div>
                            </form>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>