@extends('layout')
@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('noContainer')
@endsection
@section("scripts")
	  <script type="text/javascript" src="{{asset('/js/scriptPrestamos.js')}}"></script>
	  <script type="text/javascript" src="{{asset('/js/scriptPrestamoPieza.js')}}"></script>
	  <script type="text/javascript" src="{{asset('/js/scriptCambioPrestamo.js')}}"></script>
@endsection
