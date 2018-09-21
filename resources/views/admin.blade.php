@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <sidebar :store="store"></sidebar>
        </div>
        <div class="col-md-10">
            <router-view :store="store"></router-view>
        </div>
    </div>
@endsection
