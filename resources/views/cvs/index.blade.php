<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All CVs</title>
</head>
<body>
    <h1>All CVs - Index Page</h1><hr>
    <br>
    @foreach ($cvs as $cv)
        <a href="{{url("/show",$cv->id)}}">
            <div class="cv-container">
                <div>
                    Name: {{$cv->name}};
                    {{ $cv->id}}
                </div>
                <div>
                    email: {{$cv->email}};
                </div>
                <div>
                    Key Programming Language: {{$cv->keyProgrammingLanguage}};
                </div>
            </div>
        </a>

        <br>
    @endforeach
</body>
</html>