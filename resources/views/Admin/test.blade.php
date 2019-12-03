@extends('layouts.app')

@section('content')
<a href = '/admin/testone/inprogress'>Inprogress: {{$inprogress}}</a>
<a href = '/admin/testone/incomplete'>Nothing Yet: {{$incomplete}}</a>
<a href = '/admin/testone/complete'>Completed: {{$complete}}</a>

@endsection