@extends('website.main.master')

@section('title','Student List')

@section('body')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6">
                <button class="btn btn-primary btn-lg"> Student List </button>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <a href="{{route('student.create')}}" class="btn btn-outline-primary btn-lg" >+ Add New Student</a>
            </div>
        </div>

        {{-- Start:: Success Message for Insert --}}
        @if (session()->has('sms'))
            <div class=" alert alert-success">{{session()->get('sms')}}</div>
        @endif
        {{-- End:: Success Message for Insert --}}

        {{-- Start:: Success Message for Delete --}}
        @if (session()->has('error'))
            <div class=" alert alert-danger">{{session()->get('error')}}</div>
        @endif
        {{-- End:: Success Message for Delete --}}

        {{-- Start:: Success Message for Update --}}
        @if (session()->has('success'))
            <div class=" alert alert-success">{{session()->get('success')}}</div>
        @endif
        {{-- End:: Success Message for Update --}}

        {{-- Start table --}}
        <table class="table table-bordered text-white bg-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Show</th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($std as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>
                            <img src="{{ url('upload/', $item->image) }}" alt="" id="indeximage" class="rounded-circle">
                        </td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->address}}</td>
                        <td><a href="{{route('student.show',$item->id)}}" class="btn btn-primary">Show</a></td>
                        <td><a href="{{route('student.edit',$item->id)}}" class="btn btn-success">Edit</a></td>
                        <td>
                            <form action="{{route('student.destroy',$item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- End table --}}
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div>{{$std->links("pagination::bootstrap-4")}}</div>
    </div>
@endsection