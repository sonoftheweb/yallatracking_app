@if($setting['view-method'] =='native')
<div class="sbox">
	<div class="sbox-title">  
		<h4> <i class="fa fa-table"></i> <?php echo $pageTitle ;?> <small>{{ $pageNote }}</small>
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-danger" onclick="ajaxViewClose('#{{ $pageModule }}')">
			<i class="fa fa fa-times"></i></a>
		</h4>
	 </div>

	<div class="sbox-content"> 
@endif	

		<table class="table table-striped table-bordered" >
			<tbody>	
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Account Type Name', (isset($fields['account_type_name']['language'])? $fields['account_type_name']['language'] : array())) }}	
						</td>
						<td>{{ $row->account_type_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Account Code', (isset($fields['account_type_code']['language'])? $fields['account_type_code']['language'] : array())) }}	
						</td>
						<td>{{ $row->account_type_code }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Sceduled Pickups Daily', (isset($fields['accout_sceduled_pickups_daily']['language'])? $fields['accout_sceduled_pickups_daily']['language'] : array())) }}	
						</td>
						<td>{{ $row->accout_sceduled_pickups_daily }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Multiple Pickup Locations', (isset($fields['account_multiple_pickup_locations']['language'])? $fields['account_multiple_pickup_locations']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->account_multiple_pickup_locations,'account_multiple_pickup_locations','1:tb_readable_response:response_number:response_value') !!} </td>
						
					</tr>
				
			</tbody>	
		</table>  
			
		 	

@if($setting['form-method'] =='native')
	</div>	
</div>	
@endif	

<script>
$(document).ready(function(){

});
</script>	