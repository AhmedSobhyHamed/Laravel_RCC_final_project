<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    hello world.
    @foreach($users as $user)
    <br>
    hello {{ $user->name }}
    <br>
    <div>
        <span>ur email/password: </span> {{ $user->email }} -- {{ $user->password }}
    </div>
    @endforeach
    <br>
</div>
