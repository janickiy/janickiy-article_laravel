@extends('layouts.app')
@section('content')
<div id="app">
    <div class="col-12 p-3">
        <article-component></article-component>
    <hr>
        <comments-component></comments-component>
</div>
@endsection

@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
