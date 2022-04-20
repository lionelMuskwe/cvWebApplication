@if (!Auth::guest())
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        {{-- {{ __('Dashboard') }} --}}
                        <h3></h3>
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
                            <form action="{{ url('logout') }}" method="POST">
                                @csrf
                            </form>

                        </div>
                        <div>

                            <div class="full-cv-container" style="font-size: 25px;">
                                <form method="POST" action="{{ url('/cvs',$cv->id)}}"" id="updateForm">
                                    @method("PUT")
                                    @csrf
                        
                                    <div class="mb-3">
                                        <span style="font-weight:bold">Name:</span> 
                                        <br>
                                        <input class="col-sm-8" type="text" name="name" value="{{$cv->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <span  style="font-weight:bold"> Email:</span> 
                                        <br>
                                        <input class="col-sm-8"type="text" name="email" value="{{$cv->email}}">
                                    </div>
                                    <div class="mb-3">
                                        <span style="font-weight:bold"> Key Programming Language:</span> 
                                        <br>
                                        <input class="col-sm-8" type="text" name="keyProgrammingLanguage" value="{{$cv->keyProgrammingLanguage}}">
                                    </div>
                                    <div class="mb-3">
                                        <span style="font-weight:bold">Education:</span> 
                                        <br>
                                        <input class="col-sm-8" type="text" name="education" value="{{$cv->education}}">
                                    </div>
                                    <div class="mb-3">
                                        <span style="font-weight:bold">Links:</span> 
                                        <br>
                                        <input class="col-sm-8" type="text" name="URLlinks" value="{{$cv->URLlinks}}">
                                    </div>
                                    <div class="mb-3">
                                        <span style="font-weight:bold">Profile:</span> 
                                        <br>
                                        <textarea class="col-sm-12" type="text" name="profile" rows=10 value="">{{$cv->profile}}</textarea>
                                    </div>
                                    
                                    <div>
                                        <button id="updateFormButton" type="submit" class="btn btn-success">Update CV</button>
                                    </div>   
                                </form>
                                <a  href="{{ url('/') }}" style="text-decoration: none; color:black;">
                                    <button class="btn btn-danger">Cancel</button>
                                </a>
                                
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script defer src="{{url('js/form_validation_update.js')}}"></script>

@else
<div class=" mt-5 ml-5"><h1>You have no authorisation to view this page. You need to be logged in</h1></div>
@endif