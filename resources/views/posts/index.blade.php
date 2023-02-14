<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="pull-right mt-3">
                            <a class="btn btn-success" href="{{ route('posts.create') }}">Add new post</a>
                        </div>
                        <br /><br />
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th width="280px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td><img src="/images/{{ $post->image }}" width="100px"></td>
                                    <td>{{ $post->category->name }}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary  text-center" href="{{ route('posts.edit', $post) }}">Update</a>
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ms-3  text-center" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>