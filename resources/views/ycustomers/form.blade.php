@extends('layouts.app')

@section('content')

  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('ycustomers?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active">{{ Lang::get('core.addedit') }} </li>
      </ul>
	  	  
    </div>
 
 	<div class="page-content-wrapper">

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	

		 {!! Form::open(array('url'=>'ycustomers/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Yalla Customers</legend>
									
								  <div class="form-group hidethis " style="display:none;"> 
									<label for="Id" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="User Group" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('User Group', (isset($fields['group_id']['language'])? $fields['group_id']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  
					<?php $group_id = explode(',',$row['group_id']);
					$group_id_opt = array( '4' => 'Customer' , ); ?>
					<select name='group_id' rows='5' required  class='select2 '  > 
						<?php 
						foreach($group_id_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['group_id'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Account Type" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Account Type', (isset($fields['account_type']['language'])? $fields['account_type']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='account_type' rows='5' id='account_type' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Username" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Username', (isset($fields['username']['language'])? $fields['username']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('username', $row['username'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Password" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Password', (isset($fields['password']['language'])? $fields['password']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('password', $row['password'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Email" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Email', (isset($fields['email']['language'])? $fields['email']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('email', $row['email'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'email'   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="First Name" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('First Name', (isset($fields['first_name']['language'])? $fields['first_name']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('first_name', $row['first_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Last Name" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Last Name', (isset($fields['last_name']['language'])? $fields['last_name']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('last_name', $row['last_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Address" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Address', (isset($fields['address']['language'])? $fields['address']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <textarea name='address' rows='5' id='address' class='form-control '  
				         required  >{{ $row['address'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="City" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('City', (isset($fields['city']['language'])? $fields['city']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='city' rows='5' id='city' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="State" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('State', (isset($fields['state']['language'])? $fields['state']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='state' rows='5' id='state' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Country" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Country', (isset($fields['country']['language'])? $fields['country']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('country', $row['country'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Phone" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Phone', (isset($fields['phone']['language'])? $fields['phone']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('phone', $row['phone'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Phone 2" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Phone 2', (isset($fields['phone_2']['language'])? $fields['phone_2']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('phone_2', $row['phone_2'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Alternate Email" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Alternate Email', (isset($fields['alternate_email']['language'])? $fields['alternate_email']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('alternate_email', $row['alternate_email'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Company" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Company', (isset($fields['company']['language'])? $fields['company']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('company', $row['company'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group hidethis " style="display:none;"> 
									<label for="Created At" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Created At', (isset($fields['created_at']['language'])? $fields['created_at']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('created_at', $row['created_at'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group hidethis " style="display:none;"> 
									<label for="Updated At" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Updated At', (isset($fields['updated_at']['language'])? $fields['updated_at']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('updated_at', $row['updated_at'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> </fieldset>
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('ycustomers?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#account_type").jCombo("{{ URL::to('ycustomers/comboselect?filter=tb_account_types:id:account_type_name') }}",
		{  selected_value : '{{ $row["account_type"] }}' });
		
		$("#city").jCombo("{{ URL::to('ycustomers/comboselect?filter=tb_cities:id:city_name') }}",
		{  selected_value : '{{ $row["city"] }}' });
		
		$("#state").jCombo("{{ URL::to('ycustomers/comboselect?filter=tb_states:id:state_name') }}",
		{  selected_value : '{{ $row["state"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop