<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-seconder">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-bold fs-4">Add New Post</h2>
                                    <a href="{{ route('posts.index') }}" class="btn btn-danger">Back</a>
                                </div>
                            </div>
                        </div>

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

                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" name="title" class="form-control" placeholder="title">
                            </div>

                            <div class="mb-3">
                                <label for="post_text" class="form-label">Post text:</label>
                                <textarea name="post_text" class="form-control" placeholder="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category:</label>
                                <select name="category_id" class="form-select" placeholder="categorie">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-info">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>