@extends('layouts.app')

@section('content')
    <div id="app">
        <supporters-index :supporters='@json($supporters)'></supporters-index>
    </div>
@endsection
