@extends('layouts.app')

@section('content')
    <div class="container">
      <p>Cari Data Users :</p>
      <form action="/users/search" method="GET">
        <input type="text" name="search" placeholder="Cari Data Users" value="{{ old('search') }}">
        <input type="submit" value="Search">
      </form>

      <br/>

        <div class="col-sm-12">
            @foreach ($users as $user)
                <div class="col-sm-3 text-center" style="padding: 5px;">
                    <div style="box-shadow: 0 0 10px 1px grey; padding: 20px;">
                        <img src="{{ $user->profile_picture }}" alt="Profile Picture" width="50" height="50">
                        {{ $user->username }}<br />
                        <a href="{{ route('user.show', $user->id) }}">View User</a>
                    </div>
                </div>
            @endforeach
            <div class="col-sm-12">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
