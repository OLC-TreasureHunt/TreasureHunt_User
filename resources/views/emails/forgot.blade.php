<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<br>
{{ sprintf(trans('message.forgot.txt1'), env('APP_NAME')) }} <br>
<br>
--------------------------------------------------------------------------------------------<br>
<br><br>
{{ trans('message.forgot.txt2') }} <br><br>
URL:<a href="{{ $url }}">{{ $url }}</a><br>
<br>
--------------------------------------------------------------------------------------------<br>
<br>
<br>
</body>
</html>
