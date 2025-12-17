@extends('layouts.main')

@section('title', $page->title)

@section('content')
    @foreach($page->content as $block)
        <x-dynamic-component :component="strtolower($block['type'])" :data="$block['data']"/>
    @endforeach
@endsection
