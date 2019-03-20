<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
@foreach($files as $file)
    {{$file->id}}
    <button>
        <a href="/admin/getPdf/{{$file->id}}">get PDF</a>
    </button>
    <button>
        <a href="/admin/approve/{{$file->id}}">approve</a>
    </button>
    <button>
        <a href="/admin/disapprove/{{$file->id}}">disapprove</a>
    </button>
    {{$file->approved}}
    <button>
        <a href="/admin/delete/{{$file->id}}">delete</a>
    </button>
    <br>
    <hr>

@endforeach
</body>
</html>