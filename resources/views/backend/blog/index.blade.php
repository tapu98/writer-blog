@extends('backend.layouts.auth-layout')
@section('content')    
    <div class="container mt-2" style="padding-left:150px !important">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Blog Details</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('blog.create') }}"> Create Blog</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Blog Name</th>
                    <th>Blog Type</th>
                    <th>Blog Description</th>
                    <th>Category Name</th>

                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->type }}</td>
                        <td>{{ $blog->description }}</td>
                        <td>{{ $blog->category }}</td>                       

                        <td>
                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('blog.edit', $blog->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $blogs->links() !!}
    </div>
@endsection