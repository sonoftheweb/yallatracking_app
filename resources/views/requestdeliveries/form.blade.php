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
		<li><a href="{{ URL::to('requestdeliveries?return='.$return) }}">{{ $pageTitle }}</a></li>
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

		 {!! Form::open(array('url'=>'requestdeliveries/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Request Delivery</legend>
									
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
								  <div class="form-group hidethis " style="display:none;"> 
									<label for="Customer" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Customer', (isset($fields['cid']['language'])? $fields['cid']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('cid', $row['cid'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Parcel Type" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Parcel Type', (isset($fields['parcel_type']['language'])? $fields['parcel_type']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  
					<?php $parcel_type = explode(',',$row['parcel_type']);
					$parcel_type_opt = array( 'Letter' => 'Letters' ,  'Appliances' => 'Appliances' ,  'Apparel' => 'Apparel' ,  'Others' => 'Others' , ); ?>
					<select name='parcel_type' rows='5' required  class='select2 '  > 
						<?php 
						foreach($parcel_type_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['parcel_type'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Parcel Content" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Parcel Content', (isset($fields['parcel_content']['language'])? $fields['parcel_content']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <textarea name='parcel_content' rows='5' id='parcel_content' class='form-control '  
				         required  >{{ $row['parcel_content'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Parcel Weight" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Parcel Weight', (isset($fields['parcel_weight']['language'])? $fields['parcel_weight']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('parcel_weight', $row['parcel_weight'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	<a href="#" data-toggle="tooltip" placement="left" class="tips" title="Enter exact weight without the "><i class="icon-question2"></i></a>
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Parcel Pickup Location" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Parcel Pickup Location', (isset($fields['parcel_pickup_location']['language'])? $fields['parcel_pickup_location']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <textarea name='parcel_pickup_location' rows='5' id='parcel_pickup_location' class='form-control '  
				         required  >{{ $row['parcel_pickup_location'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Parcel Pickup City" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Parcel Pickup City', (isset($fields['parcel_pickup_zone']['language'])? $fields['parcel_pickup_zone']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='parcel_pickup_zone' rows='5' id='parcel_pickup_zone' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Parcel Pickup Dropoff Location" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Parcel Pickup Dropoff Location', (isset($fields['parcel_pickup_dropoff_location']['language'])? $fields['parcel_pickup_dropoff_location']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <textarea name='parcel_pickup_dropoff_location' rows='5' id='parcel_pickup_dropoff_location' class='form-control '  
				         required  >{{ $row['parcel_pickup_dropoff_location'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Parcel Dropoff City" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Parcel Dropoff City', (isset($fields['parcel_dropoff_zone']['language'])? $fields['parcel_dropoff_zone']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='parcel_dropoff_zone' rows='5' id='parcel_dropoff_zone' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Parcel Delivery Priority" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Parcel Delivery Priority', (isset($fields['parcel_delivery_priority']['language'])? $fields['parcel_delivery_priority']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='parcel_delivery_priority' rows='5' id='parcel_delivery_priority' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Parcel Delivery Code" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Parcel Delivery Code', (isset($fields['parcel_delivery_code']['language'])? $fields['parcel_delivery_code']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('parcel_delivery_code', $row['parcel_delivery_code'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Prefered Date Of Delivery" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Prefered Date Of Delivery', (isset($fields['prefered_date_of_delivery']['language'])? $fields['prefered_date_of_delivery']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('prefered_date_of_delivery', $row['prefered_date_of_delivery'],array('class'=>'form-control date')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div> 
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
					<button type="button" onclick="location.href='{{ URL::to('requestdeliveries?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#parcel_pickup_zone").jCombo("{{ URL::to('requestdeliveries/comboselect?filter=tb_cities:city_code:city_name') }}",
		{  selected_value : '{{ $row["parcel_pickup_zone"] }}' });
		
		$("#parcel_dropoff_zone").jCombo("{{ URL::to('requestdeliveries/comboselect?filter=tb_cities:city_code:city_name') }}",
		{  selected_value : '{{ $row["parcel_dropoff_zone"] }}' });
		
		$("#parcel_delivery_priority").jCombo("{{ URL::to('requestdeliveries/comboselect?filter=tb_priority_pricing:id:service_type') }}",
		{  selected_value : '{{ $row["parcel_delivery_priority"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop