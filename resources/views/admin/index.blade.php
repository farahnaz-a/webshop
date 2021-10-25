@extends('admin.dashboard')


@section('title')
{{ config('app.name') }} | Admin Dashboard
@endsection

@section('dashboard')
active
@endsection

@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Pages</a>
    <span class="breadcrumb-item active">Blank Page</span>
</nav>
@endsection

@section('content')

    <div>
        <span>Chart</span>
    </div>


@endsection
