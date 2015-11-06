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
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('requestdeliveries?return='.$return) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('requestdeliveries/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	


	
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}	
						</td>
						<td>{{ $row->id }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Customer', (isset($fields['cid']['language'])? $fields['cid']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->cid,'cid','1:tb_customers:id:first_name|last_name|company') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Parcel Type', (isset($fields['parcel_type']['language'])? $fields['parcel_type']['language'] : array())) }}	
						</td>
						<td>{{ $row->parcel_type }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Parcel Content', (isset($fields['parcel_content']['language'])? $fields['parcel_content']['language'] : array())) }}	
						</td>
						<td>{{ $row->parcel_content }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Parcel Weight', (isset($fields['parcel_weight']['language'])? $fields['parcel_weight']['language'] : array())) }}	
						</td>
						<td>{{ $row->parcel_weight }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Parcel Pickup Location', (isset($fields['parcel_pickup_location']['language'])? $fields['parcel_pickup_location']['language'] : array())) }}	
						</td>
						<td>{{ $row->parcel_pickup_location }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Parcel Pickup Zone', (isset($fields['parcel_pickup_zone']['language'])? $fields['parcel_pickup_zone']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->parcel_pickup_zone,'parcel_pickup_zone','1:tb_cities:id:city_name|city_zone') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Parcel Pickup Dropoff Location', (isset($fields['parcel_pickup_dropoff_location']['language'])? $fields['parcel_pickup_dropoff_location']['language'] : array())) }}	
						</td>
						<td>{{ $row->parcel_pickup_dropoff_location }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Parcel Dropoff Zone', (isset($fields['parcel_dropoff_zone']['language'])? $fields['parcel_dropoff_zone']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->parcel_dropoff_zone,'parcel_dropoff_zone','1:tb_cities:id:city_name|city_zone') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Parcel Delivery Priority', (isset($fields['parcel_delivery_priority']['language'])? $fields['parcel_delivery_priority']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->parcel_delivery_priority,'parcel_delivery_priority','1:tb_priority_pricing:id:service_type') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Parcel Delivery Code', (isset($fields['parcel_delivery_code']['language'])? $fields['parcel_delivery_code']['language'] : array())) }}	
						</td>
						<td>{{ $row->parcel_delivery_code }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Date Requested', (isset($fields['date_requested']['language'])? $fields['date_requested']['language'] : array())) }}	
						</td>
						<td>{{ $row->date_requested }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Prefered Date Of Delivery', (isset($fields['prefered_date_of_delivery']['language'])? $fields['prefered_date_of_delivery']['language'] : array())) }}	
						</td>
						<td>{{ $row->prefered_date_of_delivery }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Entry By', (isset($fields['entry_by']['language'])? $fields['entry_by']['language'] : array())) }}	
						</td>
						<td>{{ $row->entry_by }} </td>
						
					</tr>
				
		</tbody>	
	</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop