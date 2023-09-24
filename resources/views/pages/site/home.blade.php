@extends('layouts.site.main')

@section('title', isset($titleWeb) ? $titleWeb : 'Trang chủ')

@section('css')
<link rel="stylesheet" href="{{ url('public/site/css/home.css') }}">
@stop

@section('content')

@if ($listPosts->count() > 0)
<x-list-post :colLg="4" :colSm="6" :listPosts="$listPosts" />
@else
<h3>Danh sách bài đăng trống!</h3>
@endif

@stop