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
        <button>
            <a href="/admin/download/{{$file->file_id}}">User id: {{$file->user_id}}</a>
        </button> <br>
        <button>
            <a href="{{$file->selfie}}" download="">User selfie: {{$file->user_id}}
                <img src="/storage/{{$file->selfie}}" alt="">
            </a>
        </button> <br><button>
            <a href="/admin/download/{{$file->bank}}">User bank: {{$file->user_id}}</a>
        </button> <br>
        <button>
            <a href="/admin/download/{{$file->dod}}">User dod: {{$file->user_id}}</a>
        </button> <br>
        <hr>

    @endforeach
</body>
</html>