@extends('layout.master')

@section('titulo')
Bienvenido a mi página
@stop 

@section('cabecera')
        {{--para llamar a un nuevo estilo recordar @parent--}}
		@parent	
		<link rel="stylesheet" type="text/css" href="">
@stop 

@section('contenido')
Esto es el contenido
@stop 

@section('pie')
Esto es el pie de la página
@stop 
