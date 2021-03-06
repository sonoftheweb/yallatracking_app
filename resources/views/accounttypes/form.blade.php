
@if($setting['form-method'] =='native')
	<div class="sbox">
		<div class="sbox-title">  
			<h4> <i class="fa fa-table"></i> <?php echo $pageTitle ;?> <small>{{ $pageNote }}</small>
				<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-danger" onclick="ajaxViewClose('#{{ $pageModule }}')"><i class="fa fa fa-times"></i></a>
			</h4>
	</div>

	<div class="sbox-content"> 
@endif	
			{!! Form::open(array('url'=>'accounttypes/save/'.SiteHelpers::encryptID($row['id']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'accounttypesFormAjax')) !!}
			<div class="col-md-12">
						<fieldset><legend> Account Packages</legend>
									
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
									<label for="Account Type Name" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Account Type Name', (isset($fields['account_type_name']['language'])? $fields['account_type_name']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('account_type_name', $row['account_type_name'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Account Code" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Account Code', (isset($fields['account_type_code']['language'])? $fields['account_type_code']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('account_type_code', $row['account_type_code'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Sceduled Pickups Daily" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Sceduled Pickups Daily', (isset($fields['accout_sceduled_pickups_daily']['language'])? $fields['accout_sceduled_pickups_daily']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  
					<?php $accout_sceduled_pickups_daily = explode(',',$row['accout_sceduled_pickups_daily']);
					$accout_sceduled_pickups_daily_opt = array( '0' => 'Pay As You Go' ,  '1' => '1' ,  '2' => '2' ,  '3' => '3' ,  '4' => '4' ,  '5' => '5' ,  '6' => '6' ,  '7' => '7' ,  '8' => '8' ,  '9' => '9' , ); ?>
					<select name='accout_sceduled_pickups_daily' rows='5'   class='select2 '  > 
						<?php 
						foreach($accout_sceduled_pickups_daily_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['accout_sceduled_pickups_daily'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Multiple Pickup Locations" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Multiple Pickup Locations', (isset($fields['account_multiple_pickup_locations']['language'])? $fields['account_multiple_pickup_locations']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='account_multiple_pickup_locations' value ='0'  @if($row['account_multiple_pickup_locations'] == '0') checked="checked" @endif > No </label>
					<label class='radio radio-inline'>
					<input type='radio' name='account_multiple_pickup_locations' value ='1'  @if($row['account_multiple_pickup_locations'] == '1') checked="checked" @endif > Yes </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> </fieldset>
			</div>
			
												
								
						
			<div style="clear:both"></div>	
							
			<div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
					<button type="submit" class="btn btn-primary btn-sm "><i class="fa  fa-save "></i>  {{ Lang::get('core.sb_save') }} </button>
					<button type="button" onclick="ajaxViewClose('#{{ $pageModule }}')" class="btn btn-success btn-sm"><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
				</div>			
			</div> 		 
			{!! Form::close() !!}


@if($setting['form-method'] =='native')
	</div>	
</div>	
@endif	

	
</div>	
			 
<script type="text/javascript">
$(document).ready(function() { 
	 
	
	$('.editor').summernote();
	$('.previewImage').fancybox();	
	$('.tips').tooltip();	
	$(".select2").select2({ width:"98%"});	
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true})
	$('.datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'}); 
	$('input[type="checkbox"],input[type="radio"]').iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green',
	});			
	$('.removeCurrentFiles').on('click',function(){
		var removeUrl = $(this).attr('href');
		$.get(removeUrl,function(response){});
		$(this).parent('div').empty();	
		return false;
	});			
	var form = $('#accounttypesFormAjax'); 
	form.parsley();
	form.submit(function(){
		
		if(form.parsley('isValid') == true){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  showRequest,
				success:       showResponse  
			}  
			$(this).ajaxSubmit(options); 
			return false;
						
		} else {
			return false;
		}		
	
	});

});

function showRequest()
{
	$('.ajaxLoading').show();		
}  
function showResponse(data)  {		
	
	if(data.status == 'success')
	{
		ajaxViewClose('#{{ $pageModule }}');
		ajaxFilter('#{{ $pageModule }}','{{ $pageUrl }}/data');
		notyMessage(data.message);	
		$('#sximo-modal').modal('hide');	
	} else {
		notyMessageError(data.message);	
		$('.ajaxLoading').hide();
		return false;
	}	
}			 

</script>		 