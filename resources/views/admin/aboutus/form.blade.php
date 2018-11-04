<div class="card">
    <div class="card-content">
        <span class="card-title"> </span>

        <div class="row">
            <div class="input-field col s6">
                {!!Form::text('title',null,array('class'=>'validate','id'=>'name'))!!}
                <label for="name"> Name</label>
            </div>

            <div class="input-field col s6">
                {!!Form::text('title_ar', null,array('class'=>'validate','id'=>'name'))!!}
                <label for="name"> Name arabic</label>
            </div>



            <div class="input-field col s6">

                <select name="icon">

                
                    <option value="1">sdasds</option>

              
                </select>

            </div>

        
            <div class=" input-field col s12 ">
                {!!Form::text('desc', null,array('class'=>'validate','id'=>'desc'))!!}
                <label for="name "> Description</label>
            </div>


            <div class="input-field col s12 ">
                {!!Form::text('desc_ar', null,array('class'=>'validate','id'=>'desc_ar'))!!}
                <label for="name "> Description arabic</label>
            </div>

        <div class="input-field col s12 ">
                {!!Form::text('link',null,array('class'=>'validate','id'=>'desc_ar'))!!}
                <label for="name "> Link</label>
            </div>



        </div>
    </div>

</div>

{!! Form::submit($submitButton, array('class'=>'btn btn-primary text-center','id' => 'submit')) !!}

<script>
</script>