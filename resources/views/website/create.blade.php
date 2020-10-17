@extends('website.main.master')

@section('title','Insert Data')
    
@section('body')
    <div class="container">
        
        <div class="mb-2">
            <a href="{{route('student.index')}}" class="btn btn-outline-warning">Back to List</a>
        </div>
        <div class="mb-3">
            <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="text-white">Name</label>
                    <input id="my-input" class="form-control" type="text" name="name" placeholder="Enter your name" value="{{old('name')}}">
                    @error('name')
                        <div><label class="text-danger">{{$message}}</label></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-white">Email</label>
                    <input id="my-input" class="form-control" type="text" name="email" placeholder="Enter your email" value="{{old('email')}}">
                    @error('email')
                        <div><label class="text-danger">{{$message}}</label></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-white">Address</label>
                    <input id="my-input" class="form-control" type="text" name="address" placeholder="Enter your address" value="{{old('address')}}">
                    @error('address')
                        <div><label class="text-danger">{{$message}}</label></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-white">Upload Image</label>
                    <input id="my-input" class="form-control" type="file" name="image">
                    @error('image')
                        <div><label class="text-danger">{{$message}}</label></div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-info btn-lg">Submit</button>
            </form>
        </div>
    </div>
@endsection