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
							{{ SiteHelpers::activeLang('Service Type', (isset($fields['service_type']['language'])? $fields['service_type']['language'] : array())) }}	
						</td>
						<td>{{ $row->service_type }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Percentage Increase In Base Price And Weight Premium', (isset($fields['percentage_increase_in_base_price_and_weight_premium']['language'])? $fields['percentage_increase_in_base_price_and_weight_premium']['language'] : array())) }}	
						</td>
						<td>{{ $row->percentage_increase_in_base_price_and_weight_premium }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Cutoff Time Within Zones', (isset($fields['cutoff_time']['language'])? $fields['cutoff_time']['language'] : array())) }}	
						</td>
						<td>{{ $row->cutoff_time }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Cutoff Time Outside Zones', (isset($fields['cutoff_time_outside_zones']['language'])? $fields['cutoff_time_outside_zones']['language'] : array())) }}	
						</td>
						<td>{{ $row->cutoff_time_outside_zones }} </td>
						
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