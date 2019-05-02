@extends('layouts.app')

@section('content')
<h1>CIAO</h1>
@endsection

@section('script')
<script>
    $( document ).ready(function() {
        $("#saludar_italiano").addClass("active");
    });
</script>
@endsection
