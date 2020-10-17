@extends('website.main.master')

@section('title','Student Detail')
    
@section('body')
    <a href="{{route('student.index')}}" class="btn btn-outline-warning btn-lg mb-4 ml-4">Back to Student List</a>
    <div class="jumbotron bg-info text-center">
        <h2 class="bg-warning p-3">Welcome to my detail</h2>
        <div class="row">
            <div class="col">
                <img src="{{ url('upload/', $student->image) }}" alt="" id="showimage" class="rounded-circle">
            </div>
            <div class="col">
                <h3>My ID is: {{$student->id}}</h3>
                <h3>My Name is: {{$student->name}}</h3>
                <h3>My Email is: {{$student->email}}</h3>
                <h3>My Address is: {{$student->address}}</h3>
            </div>
        </div>
    </div>
@endsection