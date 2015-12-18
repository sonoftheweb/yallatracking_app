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
		<li><a href="{{ URL::to('bulkdelivery?return='.$return) }}">{{ $pageTitle }}</a></li>
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

		 {!! Form::open(array('url'=>'bulkdelivery/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Request Bulk Delivery</legend>

							<div class="form-group" style="text-align: center;">
								Please upload only CSV and Excel Files. <a href="<?php echo url('../docs/bulk-delivery-template.csv'); ?>">Download the CSV format</a>, edit and upload to complete the bulk download.
							</div>


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
									<label for="Cid" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Cid', (isset($fields['cid']['language'])? $fields['cid']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('cid', SiteHelpers::getCustomerIdFromUserId(),array('class'=>'form-control', 'placeholder'=>'',   )) !!}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group hidethis " style="display:none;"> 
									<label for="Date Requested" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Date Requested', (isset($fields['date_requested']['language'])? $fields['date_requested']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('date_requested', $row['date_requested'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Bulk File" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Bulk File', (isset($fields['bulk_file']['language'])? $fields['bulk_file']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <input  type='file' name='bulk_file' id='bulk_file' @if($row['bulk_file'] =='') class='required' @endif style='width:150px !important;'  />
					 	{{--<div >
						{!! SiteHelpers::showUploadedFile($row['bulk_file'],'bulk-requests') !!}
						
						</div>--}}
					 
									 </div> 
									 <div class="col-md-2">
									 	<a href="#" data-toggle="tooltip" placement="left" class="tips" title="Only CSV files"><i class="icon-question2"></i></a>
									 </div>
								  </div> 					
								  <div class="form-group hidethis " style="display:none;"> 
									<label for="Status" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Status', (isset($fields['status']['language'])? $fields['status']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('status', $row['status'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Price" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Price', (isset($fields['price']['language'])? $fields['price']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <textarea name='price' rows='5' id='price' class='form-control '  
				           >{{ $row['price'] }}</textarea> 
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
					<button type="button" onclick="location.href='{{ URL::to('bulkdelivery?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
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