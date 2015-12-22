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

		 {!! Form::open(array('url'=>'ycustomers/save?return='.$return, 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-4">
						<fieldset><legend> Account Details</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group hidethis " style="display:none;">
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('User Group', (isset($fields['group_id']['language'])? $fields['group_id']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('group_id', $row['group_id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Account Type', (isset($fields['account_type']['language'])? $fields['account_type']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <select name='account_type' rows='5' id='account_type' class='select2 ' required  ></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Customer Group', (isset($fields['customer_group']['language'])? $fields['customer_group']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <select name='customer_group' rows='5' id='customer_group' class='select2 ' required  ></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Username', (isset($fields['username']['language'])? $fields['username']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('username', $row['username'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Password', (isset($fields['password']['language'])? $fields['password']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('password', $row['password'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Email', (isset($fields['email']['language'])? $fields['email']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('email', $row['email'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'email'   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Alternate Email', (isset($fields['alternate_email']['language'])? $fields['alternate_email']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('alternate_email', $row['alternate_email'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group hidethis " style="display:none;">
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Created At', (isset($fields['created_at']['language'])? $fields['created_at']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('created_at', $row['created_at'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group hidethis " style="display:none;">
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Updated At', (isset($fields['updated_at']['language'])? $fields['updated_at']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('updated_at', $row['updated_at'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> </fieldset>
			</div>
			
			<div class="col-md-4">
						<fieldset><legend> User Details</legend>
									
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('First Name', (isset($fields['first_name']['language'])? $fields['first_name']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('first_name', $row['first_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Last Name', (isset($fields['last_name']['language'])? $fields['last_name']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('last_name', $row['last_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Address', (isset($fields['address']['language'])? $fields['address']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <textarea name='address' rows='5' id='address' class='form-control '  
				         required  >{{ $row['address'] }}</textarea> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('City', (isset($fields['city']['language'])? $fields['city']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <select name='city' rows='5' id='city' class='select2 ' required  ></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('State', (isset($fields['state']['language'])? $fields['state']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <select name='state' rows='5' id='state' class='select2 ' required  ></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Country', (isset($fields['country']['language'])? $fields['country']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('country', $row['country'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Phone', (isset($fields['phone']['language'])? $fields['phone']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('phone', $row['phone'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Phone 2', (isset($fields['phone_2']['language'])? $fields['phone_2']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('phone_2', $row['phone_2'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> </fieldset>
			</div>
			
			<div class="col-md-4">
						<fieldset><legend> Company Details</legend>
									
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Company', (isset($fields['company']['language'])? $fields['company']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('company', $row['company'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Customer Company RC Number', (isset($fields['customer_company_rc_number']['language'])? $fields['customer_company_rc_number']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('customer_company_rc_number', $row['customer_company_rc_number'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Customer Company Director Name', (isset($fields['customer_company_director_name']['language'])? $fields['customer_company_director_name']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('customer_company_director_name', $row['customer_company_director_name'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Customer Company Director Name', (isset($fields['customer_company_director_name_2']['language'])? $fields['customer_company_director_name_2']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('customer_company_director_name_2', $row['customer_company_director_name_2'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Customer Company Opening Hours', (isset($fields['customer_company_opening_hours']['language'])? $fields['customer_company_opening_hours']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('customer_company_opening_hours', $row['customer_company_opening_hours'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Customer Preferred Pickup Times', (isset($fields['customer_preferred_pickup_times']['language'])? $fields['customer_preferred_pickup_times']['language'] : array())) !!}		
									 <span class="asterix"> * </span> <a href="#" data-toggle="tooltip" placement="left" class="tips" title="HH:MM"><i class="icon-question2"></i></a> </label>									
									  {!! Form::text('customer_preferred_pickup_times', $row['customer_preferred_pickup_times'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
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
		
		$("#customer_group").jCombo("{{ URL::to('ycustomers/comboselect?filter=tb_customer_group:id:group_name') }}",
		{  selected_value : '{{ $row["customer_group"] }}' });
		
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