<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
{{ sprintf(trans('message.register.txt1'), $name) }}<br>
<br>
{{ sprintf(trans('message.activate.txt1'), env('APP_NAME')) }}<br>
<br>

<br>
{{ trans('message.activate.txt4') }}<br>
<br>
{{ trans('message.activate.txt5') }}<br>
<a href="{{ $url }}">{{ $url }}</a><br>
<br>
{{ trans('message.activate.txt6') }}<br>
{{ trans('message.activate.txt7') }}<br>
<br>
</body>
</html>
