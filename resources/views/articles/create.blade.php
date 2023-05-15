@extends('layout.template')

@section('content')
    <form action="{{$url_form}}" method="post" enctype="multipart/form-data">
        @csrf
        {!! (isset($data))? method_field('PUT'):'' !!}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{isset($data)?$data->title:old('title')}}">
            @error('title')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{isset($data)?$data->content:old('content')}}</textarea>
            @error('content')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        @isset($data)
            <div class="form-group">
                <img src="{{asset('storage/'.$data->featured_image)}}" alt="{{$data->title}}" width="150">
            </div>
        @endisset
        <div class="form-group">
            <label for="image">Feature Image</label>
            <input type="file" accept="image/*" name="image" id="image" class="form-control">
            @error('image')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
