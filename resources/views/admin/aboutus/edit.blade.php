@extends('admin.dashboard')
@section('content')
 
        {!! Form:: model($row,array('method' => 'PATCH','action' => ['AboutusController@update',$row->id], 'files'=>true,'class' => 'ajax-form-request')) !!}
        <div class="message" style="padding:26px; ">
        </div><!-- div to display message after insert -->
          @include ('admin.aboutus.form',['submitButton' =>'Submit Data'])
        {!! Form::close() !!} 
 
  
 @endsection