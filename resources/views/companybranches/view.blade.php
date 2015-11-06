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
							{{ SiteHelpers::activeLang('Customer Id', (isset($fields['customer_id']['language'])? $fields['customer_id']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->customer_id,'customer_id','1:tb_customers:id:email|company') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Branch Address', (isset($fields['branch_address']['language'])? $fields['branch_address']['language'] : array())) }}	
						</td>
						<td>{{ $row->branch_address }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Branch City', (isset($fields['branch_city']['language'])? $fields['branch_city']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->branch_city,'branch_city','1:tb_cities:id:city_name') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Branch State', (isset($fields['branch_state']['language'])? $fields['branch_state']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->branch_state,'branch_state','1:tb_states:id:state_name') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Branch Country', (isset($fields['branch_country']['language'])? $fields['branch_country']['language'] : array())) }}	
						</td>
						<td>{{ $row->branch_country }} </td>
						
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