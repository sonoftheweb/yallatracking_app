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
		<li><a href="{{ URL::to('admincustdeladdview?return='.$return) }}">{{ $pageTitle }}</a></li>
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

		 {!! Form::open(array('url'=>'admincustdeladdview/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Customer Delivery Addresses</legend>
									
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
									<label for="Delivery Address" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Delivery Address', (isset($fields['delivery_address']['language'])? $fields['delivery_address']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('delivery_address', $row['delivery_address'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Delivery City" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Delivery City', (isset($fields['delivery_city']['language'])? $fields['delivery_city']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='delivery_city' rows='5' id='delivery_city' class='select2 '   ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Delivery State" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Delivery State', (isset($fields['delivery_state']['language'])? $fields['delivery_state']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='delivery_state' rows='5' id='delivery_state' class='select2 '   ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Delivery Country" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Delivery Country', (isset($fields['delivery_country']['language'])? $fields['delivery_country']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('delivery_country', $row['delivery_country'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
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
					<button type="button" onclick="location.href='{{ URL::to('admincustdeladdview?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#delivery_city").jCombo("{{ URL::to('admincustdeladdview/comboselect?filter=tb_cities:id:city_name') }}",
		{  selected_value : '{{ $row["delivery_city"] }}' });
		
		$("#delivery_state").jCombo("{{ URL::to('admincustdeladdview/comboselect?filter=tb_states:id:state_name') }}",
		{  selected_value : '{{ $row["delivery_state"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop