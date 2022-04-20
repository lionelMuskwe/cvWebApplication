@extends('layouts.app')

@section('content')
<div class="container col-md-9">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        {{ __('Dashboard') }}
                    </div>
                    <div>
                        <form method="GET" action="{{ url('/search')}}">
                            <div class="d-flex justify-content-between">
                                <input type="search " name="query" placeholder="Find a CV" class="form-control">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <div>
                            Your currently saved CVs:
                            <hr>
                            @foreach ($cvs as $cv)
                                    <div class="row cv-container d-flex justify-content-between align-items-center">
                                        <div class="ml-4 col-sm-7">
                                            <a href="{{url("/show",$cv->id)}}" style="text-decoration:none">
                                                <div >
                                                    <span class="" style="font-size:25px;">Name: </span>
                                                    <span class="" style="font-size:25px; text-shadow: black 1.5px 1px">{{$cv->name}}  </span> 
                                                </div>
                                                <div class="mt-2">
                                                    <div >
                                                        <span class="" style="font-size:25px;">Email: </span>
                                                        <span class="" style="font-size:25px;text-shadow: rgb(159, 236, 36) 1.5px 1px">{{$cv->email}}  </span>      
                                                    </div>
                                                </div>
                                                <div class="mt-2 mb-4">
                                                    <span class="" style="font-size:25px;">Key Programming Language :</span>
                                                    <span class="" style="font-size:25px;text-shadow: rgb(208, 52, 223) 1.5px 1px">{{$cv->keyProgrammingLanguage}}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-center pl-4 col-sm-4">
                                            <div class="mr-3">
                                                <a href="{{url("/show",$cv->id)}}">
                                                    <button class="btn btn-info">Show</button>
                                                </a>
                                            </div>
                                            <div  class="mr-3">
                                                <a href="cvs/{{$cv->id}}/edit">
                                                <button class="btn btn-success">Edit</button>
                                                </a>
                                            </div>
                                            <div>
                                                <form action={{ url('/cvs',$cv->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                                
                                                {{-- </a><a href='{{route("route.check" [cv])}}'>
                                                    <h6>New - Link</h6>
                                                </a> --}}
                                            </div>
    
                                        </div> 
                                    </div>


                                <hr class="col-sm-6">
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
