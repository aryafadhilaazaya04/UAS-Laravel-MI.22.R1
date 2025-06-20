@extends('layouts.main')
@section('content')

<h1>Halaman About</h1>
<h3>{{ $name }}</h3>
<P>{{ $email }}</P>
<img src="img/{{ $image }}" alt="{{ $name }}" width="150">

@endsection