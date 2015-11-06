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
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('admincustdeladdview?return='.$return) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('admincustdeladdview/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	


	
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Customer Id', (isset($fields['customer_id']['language'])? $fields['customer_id']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->customer_id,'customer_id','1:tb_customers:id:first_name|last_name|id') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Delivery Address', (isset($fields['delivery_address']['language'])? $fields['delivery_address']['language'] : array())) }}	
						</td>
						<td>{{ $row->delivery_address }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Delivery City', (isset($fields['delivery_city']['language'])? $fields['delivery_city']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->delivery_city,'delivery_city','1:tb_cities:id:city_name') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Delivery State', (isset($fields['delivery_state']['language'])? $fields['delivery_state']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->delivery_state,'delivery_state','1:tb_states:id:state_name') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Delivery Country', (isset($fields['delivery_country']['language'])? $fields['delivery_country']['language'] : array())) }}	
						</td>
						<td>{{ $row->delivery_country }} </td>
						
					</tr>
				
		</tbody>	
	</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop