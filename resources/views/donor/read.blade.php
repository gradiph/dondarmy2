@extends('layouts.admin.app')
@section('title') List Donor | @stop
@section('content')

<div id="data"></div>
<script>
$(document).ready(function(){
    ajaxLoad('donor/list','data');
});
</script>

@stop
