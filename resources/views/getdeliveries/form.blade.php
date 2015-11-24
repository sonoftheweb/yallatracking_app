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
		<li><a href="{{ URL::to('getdeliveries?return='.$return) }}">{{ $pageTitle }}</a></li>
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

		 {!! Form::open(array('url'=>'getdeliveries/save?return='.$return, 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-4">
						<fieldset><legend> Delivery Details</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 						
								  </div> 					
								  <div class="form-group hidethis " style="display:none;">
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Cid', (isset($fields['cid']['language'])? $fields['cid']['language'] : array())) !!}		
									   </label>									
									  {!! Form::text('cid', SiteHelpers::getCustomerIdFromUserId(),array('class'=>'form-control', 'placeholder'=>'',   )) !!}
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
									 <span class="asterix"> * </span>  </label>									
									  {!! Form::text('parcel_delivery_code', SiteHelpers::delivery_code(),array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!}
								  </div> 					
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Prefered Date Of Delivery', (isset($fields['prefered_date_of_delivery']['language'])? $fields['prefered_date_of_delivery']['language'] : array())) !!}
										<span class="asterix"> * </span>
									</label>
									  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('prefered_date_of_delivery', $row['prefered_date_of_delivery'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;', 'required'=>'true')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 						
								  </div> </fieldset>
			</div>
			
			<div class="col-md-4">
						<fieldset><legend> Pickup Data </legend>
									
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Pickup Address', (isset($fields['parcel_pickup_location']['language'])? $fields['parcel_pickup_location']['language'] : array())) !!}		
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
								  </div> </fieldset>
			</div>
			
			<div class="col-md-4">
						<fieldset><legend> Delivery Data</legend>
									
								  <div class="form-group  " >
									<label for="ipt" class=" control-label ">
										{!! SiteHelpers::activeLang('Parcel Dropoff Address', (isset($fields['parcel_dropoff_location']['language'])? $fields['parcel_dropoff_location']['language'] : array())) !!}		
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
								  </div> </fieldset>
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('getdeliveries?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#parcel_delivery_priority").jCombo("{{ URL::to('getdeliveries/comboselect?filter=tb_priority_pricing:id:service_type') }}",
		{  selected_value : '{{ $row["parcel_delivery_priority"] }}' });
		
		$("#parcel_pickup_zone").jCombo("{{ URL::to('getdeliveries/comboselect?filter=tb_cities:city_code:city_name') }}",
		{  selected_value : '{{ $row["parcel_pickup_zone"] }}' });
		
		$("#parcel_dropoff_zone").jCombo("{{ URL::to('getdeliveries/comboselect?filter=tb_cities:city_code:city_name') }}",
		{  selected_value : '{{ $row["parcel_dropoff_zone"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop