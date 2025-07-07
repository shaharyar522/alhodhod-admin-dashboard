
 @extends('layouts.app');

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            <h1>Articles Images</h1>
            <a href="{{ route('articles_images.create') }}" class="btn btn-primary mb-3">Add New Image</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articlesImages as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td><img src="{{ asset('storage/' . $image->path) }}" alt="Image" style="width: 100px;"></td>
                            <td>
                                <a href="{{ route('articles_images.edit', $image->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('articles_images.destroy', $image->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>