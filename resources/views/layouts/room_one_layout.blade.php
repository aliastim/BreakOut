@extends('layouts.rooms_layout')

@section('scripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">
    <link rel="stylesheet" href="{{secure_asset('css/room_one.css')}}">
@endsection
