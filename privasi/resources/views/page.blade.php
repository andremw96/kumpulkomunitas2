@extends('layout.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appened to the master sidebar.</p>
@endsection

@section('content')
	<h2>{{$name}}</h2>
    <p> This is my body content.</p>

    <h2>If Statement</h2>
   @if ($day == 'Friday')
   		<p>Time To Party</p>
   @else
   		<p>Time to Make Money</p>
   @endif

    <h2>Foreach loop</h2>
   @foreach ($drinks as $drink)
   		{{$drink}} <br>
   @endforeach

   	<h2>Execute PHP Function</h2>
   	<p>The Date is : {{date(' D M, Y')}}</p>
@endsection