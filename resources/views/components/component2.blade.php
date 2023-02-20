<h1>I am component 2.blade.php</h1>
<ul>
    @foreach ($users as $user)
        <li>{{$user->name}}</li>
    @endforeach
</ul>
