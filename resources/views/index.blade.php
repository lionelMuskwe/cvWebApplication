<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>
<body>
    <h1>Welcome to my CV</h1>
    <hr>
    <div>
       <form method="GET" action="{{ url('/search')}}">
           <div>
               <input type="search" name="query" placeholder="Find CV">
               <button type="submit">Search</button>
           </div>
       </form>
    </div>
</body>
</html>