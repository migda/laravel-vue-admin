@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <sidebar></sidebar>
        </div>
        <div class="col-md-10">
            <router-view></router-view>
        </div>
    </div>
@endsection
