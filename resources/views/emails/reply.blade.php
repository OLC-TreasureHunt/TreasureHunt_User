<label style="color: #0000FF">Hello {{ $name }}! This is reply message from {{ config('APP_NAME', 'AIOBOT') }}.</label>
<br><br>

<label style="color: red;">{!! nl2br(e($subject)) !!}</label>
<br><br>
<label style="color: #0fbf7e;">{!! nl2br(e($msg)) !!}</label>
<br><br>

<strong>{!! nl2br(e($reply)) !!}</strong>
<br><br>

<br>Thank for use our program.