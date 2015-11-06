
@if($setting['form-method'] =='native')
	<div class="sbox">
		<div class="sbox-title">  
			<h4> <i class="fa fa-table"></i> <?php echo $pageTitle ;?> <small>{{ $pageNote }}</small>
				<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-danger" onclick="ajaxViewClose('#{{ $pageModule }}')"><i class="fa fa fa-times"></i></a>
			</h4>
	</div>

	<div class="sbox-content"> 
@endif	
			{!! Form::open(array('url'=>'companybranches/save/'.SiteHelpers::encryptID($row['id']), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ','id'=> 'companybranchesFormAjax')) !!}
			<div class="col-md-12">
						<fieldset><legend> Company Branches</legend>
									
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
									  {!! Form::text('customer_id', SiteHelpers::getCustomerIdFromUserId(),array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!}
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Branch Address" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Branch Address', (isset($fields['branch_address']['language'])? $fields['branch_address']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('branch_address', $row['branch_address'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Branch City" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Branch City', (isset($fields['branch_city']['language'])? $fields['branch_city']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='branch_city' rows='5' id='branch_city' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Branch State" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Branch State', (isset($fields['branch_state']['language'])? $fields['branch_state']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  <select name='branch_state' rows='5' id='branch_state' class='select2 ' required  ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " > 
									<label for="Branch Country" class=" control-label col-md-4 text-left"> 
									{!! SiteHelpers::activeLang('Branch Country', (isset($fields['branch_country']['language'])? $fields['branch_country']['language'] : array())) !!}	
									</label>
									<div class="col-md-6">
									  {!! Form::text('branch_country', $row['branch_country'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) !!} 
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
	
		$("#branch_city").jCombo("{{ URL::to('companybranches/comboselect?filter=tb_cities:id:city_name') }}",
		{  selected_value : '{{ $row["branch_city"] }}' });
		
		$("#branch_state").jCombo("{{ URL::to('companybranches/comboselect?filter=tb_states:id:state_name') }}",
		{  selected_value : '{{ $row["branch_state"] }}' });
		 
	
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
	var form = $('#companybranchesFormAjax'); 
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