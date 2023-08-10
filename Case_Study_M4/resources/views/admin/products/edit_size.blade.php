@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Size</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('size.update', $size->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Size Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $size->name) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
