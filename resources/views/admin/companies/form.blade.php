


            @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
           @endif

 <div class="input-field col s6">
    {!!Form::text('name', null,array('class'=>'validate','id'=>'name','required'=>'required'))!!}
    <label for="name">Member Name</label>
   

</div>
<div class="input-field col s6">
    {!!Form::text('email', null,array('class'=>'validate','id'=>'email','required'=>'required',))!!}
    <label for="email">Member Email</label>

</div>

 <div class="input-field col s6">
    {!!Form::text('tel',null,array('class'=>'validate','id'=>'name','required'=>'required'))!!}
    <label for="name">Member Telephone</label>

</div>
 <div class="input-field col s6">
    {!!Form::text('address', null,array('class'=>'validate','id'=>'name','required'=>'required'))!!}
    <label for="name">Member Address</label>
  

</div>


{!! Form::submit($submitButton, array('class'=>'btn btn-primary text-center','id' => 'submit')) !!}
