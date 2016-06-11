@extends('main')

@section('title', '| Profile')

@section('content')

  <img class="img-circle avatar-img" src="/uploads/avatars/{{ $user->avatar }}" alt="">

  <h2>{{ $user->name }}' Profile</h2>

  <form enctype="multipart/form-data" action="/profile" method="POST">

    <label>Update Profile Image</label>

    <input type="file" name="avatar">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="submit" class="pull-right btn btn-sm btn-primary">

  </form>

@stop