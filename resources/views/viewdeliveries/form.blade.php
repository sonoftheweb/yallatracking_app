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
		<li><a href="{{ URL::to('viewdeliveries?return='.$return) }}">{{ $pageTitle }}</a></li>
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

		 {!! Form::open(array('url'=>'viewdeliveries/save?return='.$return, 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<ul class="nav nav-tabs"><li class="active"><a href="#DeliveryData" data-toggle="tab">Delivery Data</a></li>
				<li class=""><a href="#PickupDetails" data-toggle="tab">Pickup Details</a></li>
				<li class=""><a href="#DropoffDetails" data-toggle="tab">Dropoff Details</a></li>
				<li class=""><a href="#Admin" data-toggle="tab">Admin</a></li>
				</ul><div class="tab-content"><div class="tab-pane m-t active" id="DeliveryData"> 
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Customer', (isset($fields['cid']['language'])? $fields['cid']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <select name='cid' rows='5' id='cid' class='select2 ' required  ></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Type', (isset($fields['parcel_type']['language'])? $fields['parcel_type']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  
					<?php $parcel_type = explode(',',$row['parcel_type']);
					$parcel_type_opt = array( 'Letters' => 'Letters' ,  'Appliances' => 'Appliances' ,  'Electronics' => 'Electronics' , ); ?>
					<select name='parcel_type' rows='5' required  class='select2 '  > 
						<?php 
						foreach($parcel_type_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['parcel_type'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Content', (isset($fields['parcel_content']['language'])? $fields['parcel_content']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('parcel_content', $row['parcel_content'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Weight', (isset($fields['parcel_weight']['language'])? $fields['parcel_weight']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('parcel_weight', $row['parcel_weight'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Delivery Priority', (isset($fields['parcel_delivery_priority']['language'])? $fields['parcel_delivery_priority']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <select name='parcel_delivery_priority' rows='5' id='parcel_delivery_priority' class='select2 ' required  ></select> 						
								  </div> 					
								  <div class="form-group hidethis " style="display:none;">
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Delivery Code', (isset($fields['parcel_delivery_code']['language'])? $fields['parcel_delivery_code']['language'] : array())) !!}		
									   </label>
									  {!! Form::text('parcel_delivery_code', $row['parcel_delivery_code'], array('class'=>'form-control', 'placeholder'=>''   )) !!}
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Prefered Date Of Delivery', (isset($fields['prefered_date_of_delivery']['language'])? $fields['prefered_date_of_delivery']['language'] : array())) !!}		
									   </label>									
									  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('prefered_date_of_delivery', $row['prefered_date_of_delivery'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 						
								  </div> 
			</div>
			
			<div class="tab-pane m-t " id="PickupDetails"> 
									
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Pickup Location', (isset($fields['parcel_pickup_location']['language'])? $fields['parcel_pickup_location']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <textarea name='parcel_pickup_location' rows='5' id='parcel_pickup_location' class='form-control '  
				         required  >{{ $row['parcel_pickup_location'] }}</textarea> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Pickup Zone', (isset($fields['parcel_pickup_zone']['language'])? $fields['parcel_pickup_zone']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <select name='parcel_pickup_zone' rows='5' id='parcel_pickup_zone' class='select2 ' required  ></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Pickup Location Landmarks', (isset($fields['pickup_location_landmarks']['language'])? $fields['pickup_location_landmarks']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('pickup_location_landmarks', $row['pickup_location_landmarks'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 
			</div>
			
			<div class="tab-pane m-t " id="DropoffDetails"> 
									
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Dropoff Contact Name', (isset($fields['dropoff_contact_name']['language'])? $fields['dropoff_contact_name']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('dropoff_contact_name', $row['dropoff_contact_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Dropoff Contact', (isset($fields['dropoff_contact']['language'])? $fields['dropoff_contact']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('dropoff_contact', $row['dropoff_contact'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Dropoff Location', (isset($fields['parcel_dropoff_location']['language'])? $fields['parcel_dropoff_location']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <textarea name='parcel_dropoff_location' rows='5' id='parcel_dropoff_location' class='form-control '  
				         required  >{{ $row['parcel_dropoff_location'] }}</textarea> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Dropoff Zone', (isset($fields['parcel_dropoff_zone']['language'])? $fields['parcel_dropoff_zone']['language'] : array())) !!}		
									 <span class="asterix"> * </span>  </label>									
									  <select name='parcel_dropoff_zone' rows='5' id='parcel_dropoff_zone' class='select2 ' required  ></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Dropoff Location Landmark', (isset($fields['dropoff_location_landmark']['language'])? $fields['dropoff_location_landmark']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('dropoff_location_landmark', $row['dropoff_location_landmark'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 
			</div>
			
			<div class="tab-pane m-t " id="Admin"> 
									
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Status', (isset($fields['status']['language'])? $fields['status']['language'] : array())) !!}		
									   </label>									
									  <select name='status' rows='5' id='status' class='select2 '   ></select> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Dispatch', (isset($fields['dispatch']['language'])? $fields['dispatch']['language'] : array())) !!}		
									   </label>									
									  <textarea name='dispatch' rows='5' id='dispatch' class='form-control '  
				           >{{ $row['dispatch'] }}</textarea> 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Pickup Time', (isset($fields['pickup_time']['language'])? $fields['pickup_time']['language'] : array())) !!}		
									   </label>									
									  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('pickup_time', $row['pickup_time'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 						
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Dropoff Time', (isset($fields['dropoff_time']['language'])? $fields['dropoff_time']['language'] : array())) !!}		
									   </label>									
									  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('dropoff_time', $row['dropoff_time'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 						
								  </div> 
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('viewdeliveries?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#cid").jCombo("{{ URL::to('viewdeliveries/comboselect?filter=tb_customers:id:first_name|last_name') }}",
		{  selected_value : '{{ $row["cid"] }}' });
		
		$("#parcel_delivery_priority").jCombo("{{ URL::to('viewdeliveries/comboselect?filter=tb_priority_pricing:id:service_type') }}",
		{  selected_value : '{{ $row["parcel_delivery_priority"] }}' });
		
		$("#parcel_pickup_zone").jCombo("{{ URL::to('viewdeliveries/comboselect?filter=tb_cities:city_code:city_name') }}",
		{  selected_value : '{{ $row["parcel_pickup_zone"] }}' });
		
		$("#parcel_dropoff_zone").jCombo("{{ URL::to('viewdeliveries/comboselect?filter=tb_cities:city_code:city_name') }}",
		{  selected_value : '{{ $row["parcel_dropoff_zone"] }}' });
		
		$("#status").jCombo("{{ URL::to('viewdeliveries/comboselect?filter=tb_status:sid:status_name') }}",
		{  selected_value : '{{ $row["status"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop