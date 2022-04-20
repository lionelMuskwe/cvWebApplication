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

                            <div class="full-cv-container">
                                <div class="cv-container" style="font-size:25px">
                                    <div class="mb-3">
                                        <span style="font-weight:bold">Name:</span> 
                                        <br>
                                        <span class="ml-5">{{$cv->name}}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span  style="font-weight:bold"> Email:</span> 
                                        <br>
                                        <span class="ml-5">{{$cv->email}}</span>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <span style="font-weight:bold"> Key Programming Language:</span> 
                                        <br>
                                        <span class="ml-5">{{$cv->keyProgrammingLanguage}}</span>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <span style="font-weight:bold">Education:</span> 
                                        <br>
                                        <span class="ml-5">{{$cv->education}}</span>
                                    </div>
                                    <div class="mb-3">
                                        <span style="font-weight:bold">Profile:</span> 
                                        <br>
                                        <div class="ml-5"> {{$cv->profile}}</div>
                                      
                                    </div>
                                    <div class="mb-3">
                                        <span style="font-weight:bold">Links:</span> 
                                        <br>
                                        <span class="ml-5">
                                            @if ($cv->URLlinks != null)
                                            {{$cv->URLlinks}}
                                            @else
                                                No Links added
                                            @endif
                                        </span>

                                    </div>
                                    
                                    @if (!Auth::guest())
                                        <div>
                                            <a href="{{ url(sprintf("/cvs/%d/edit",$cv->id)) }}"><button class="btn btn-success mt-2">Edit this CV</button> </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

