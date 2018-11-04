@extends('admin.dashboard')
@section('content') 
     
<div class="row">
{!! Form::open(array('route' =>'companies.store','files'=>true,'class' => 'ajax-form-request')) !!}
<div class="message" style="padding:26px; ">

</div>
	

@include ('admin.companies.form',['submitButton' => 'Submit Data'])
{!! Form::close() !!}   
</div>
@endsection