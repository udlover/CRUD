@extends('website.main.master')

@section('title','Edit Record Form')
    
@section('body')
    <div class="container">
        <div class="mb-4">
            <a href="{{route('student.index')}}" class="btn btn-outline-warning btn-lg">Back to Student List</a>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-white">
                    <form action="{{route('student.update',$student->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label class="text-white">Name</label>
                            <input id="my-input" class="form-control" type="text" name="name" placeholder="Enter your name" value="{{$student->name}}">
                            @error('name')
                                <div><label class="text-danger">{{$message}}</label></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-white">Email</label>
                            <input id="my-input" class="form-control" type="text" name="email" placeholder="Enter your email" value="{{$student->email}}">
                            @error('email')
                                <div><label class="text-danger">{{$message}}</label></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-white">Address</label>
                            <input id="my-input" class="form-control" type="text" name="address" placeholder="Enter your address" value="{{$student->address}}">
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
                        <div class="form-group">
                            <input type="hidden" name="my_image" value="{{$student->image}}">
                        </div>
                        <button type="submit" class="btn btn-info btn-lg">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-center">
                    <div>
                        <h2 class="text-center text-white">Profile Picture</h2>
                        <img src="{{ url('upload/', $student->image) }}" alt="" id="showimage" class="rounded-circle">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection