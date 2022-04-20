@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        {{-- {{ __('Dashboard') }} --}}
                        <h3>Publicly Available CVs</h3>
                        
                    </div>
                    <div>
                        <form method="GET" action="{{ url('/search')}}">
                            <div class="d-flex justify-content-between">
                                <input type="search " name="query" placeholder="python.." class="form-control">
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

                            @if ($cvs->count())
                                @foreach ($cvs as $cv)
                                    <a href="{{url("/show",$cv->id)}}">
                                        <div class="cv-container">
                                            <div>
                                                Name: {{$cv->name}};
                                            </div>
                                            <div>
                                                email: {{$cv->email}};
                                            </div>
                                            <div>
                                                Key Programming Language: {{$cv->keyProgrammingLanguage}};
                                            </div>
                                        </div>
                                        <br>
                                    </a>
                                @endforeach
                            @else
                                <h5>No CVs matching search query where found</h5>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
