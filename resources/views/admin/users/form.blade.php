 
<div class="input-field col s12">
    <i class="material-icons prefix">email</i>
    {!!Form::email('email', null,array('class'=>'validate','id'=>'email','required'=>'required'))!!}
    <label for="email">User Email</label>
    <label class="error">{{ $errors->first('email') }}</label>
</div>
<div class="input-field col s12">
    <i class="material-icons prefix">account_circle</i>
    {!!Form::text('name', null,array('class'=>'validate','id'=>'name','required'=>'required'))!!}
    <label for="name">User First Name</label>
</div>


<div class="input-field col s12">
    <i class="material-icons prefix">account_circle</i>
    {!!Form::text('phone',null,array('class'=>'validate','id'=>'name','required'=>'required'))!!}
    <label for="name">Phone</label>
</div>

<div class="input-field col s12">
    <i class="material-icons prefix">lock</i>

    {!!Form::password('password', null,array('class'=>'validate','id'=>'password','required'=>'required'))!!}
    <label for="password">Password</label>
    <label class="error">{{ $errors->first('password') }}</label>
</div>
<div class="input-field col s12">
    <i class="material-icons prefix">lock</i>
    {!!Form::password('password_confirmation', null,array('class'=>'validate','id'=>'password_confirmation','required'=>'required'))!!}
    <label for="password_confirmation">Password Confirmation</label>
    <label class="error">{{ $errors->first('password_confirmation') }}</label>
</div>

     <div class="input-field col s6">
     {!!Form::select('permission',array('1'=>'Admin','2' =>'Employee'),null,array('class'=>'validate','required'=>'required'))!!}
     <label for="status">Permission</label>
            
     </div>
     <div class="input-field col s6">
        <select name="company_id" class="validate">
        @foreach($companies as $company)
        <option value="{{$company->id}}">{{$company->name}}</option>
          @endforeach
         
        </select>


     </div>            
    
           
{!! Form::submit($submitButton, array('class'=>'btn btn-primary text-center','id' => 'submit')) !!}
