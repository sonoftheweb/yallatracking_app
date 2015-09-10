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
						<fieldset><legend> Customers</legend>
									
								  <div class="form-group  " > 
									<label for="Customer Id" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Customer Id', (isset($fields['customer_id']['language'])? $fields['customer_id']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('customer_id', $row['customer_id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="User Id" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('User Id', (isset($fields['user_id']['language'])? $fields['user_id']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('user_id', $row['user_id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Customer Address" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Customer Address', (isset($fields['customer_address']['language'])? $fields['customer_address']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <textarea name='customer_address' rows='5' id='customer_address' class='form-control '  
				           >{{ $row['customer_address'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Customer Phone" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Customer Phone', (isset($fields['customer_phone']['language'])? $fields['customer_phone']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('customer_phone', $row['customer_phone'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Customer Phone 2" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Customer Phone 2', (isset($fields['customer_phone_2']['language'])? $fields['customer_phone_2']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('customer_phone_2', $row['customer_phone_2'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Customer Alternate Email" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Customer Alternate Email', (isset($fields['customer_alternate_email']['language'])? $fields['customer_alternate_email']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('customer_alternate_email', $row['customer_alternate_email'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Customer Company" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Customer Company', (isset($fields['customer_company']['language'])? $fields['customer_company']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('customer_company', $row['customer_company'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Customer Account Type" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Customer Account Type', (isset($fields['customer_account_type']['language'])? $fields['customer_account_type']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('customer_account_type', $row['customer_account_type'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
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
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop