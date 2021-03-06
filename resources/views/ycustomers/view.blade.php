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
		<li><a href="{{ URL::to('ycustomers?return='.$return) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
		   @unless (SiteHelpers::is_customer())
	   		<a href="{{ URL::to('ycustomers?return='.$return) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="fa fa-arrow-circle-left"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
		   @endunless
			{{--@if($access['is_add'] ==1)--}}
	   		<a href="{{ URL::to('ycustomers/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			{{--@endif--}}
		</div>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"> <h4> <i class="fa fa-table"></i> </h4></div>
	<div class="sbox-content"> 	


	
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('CID', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}	
						</td>
						<td>{{ $row->id }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Account Type', (isset($fields['account_type']['language'])? $fields['account_type']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->account_type,'account_type','1:tb_account_types:id:account_type_name') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Customer Group', (isset($fields['customer_group']['language'])? $fields['customer_group']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->customer_group,'customer_group','1:tb_customer_group:id:group_name') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Email', (isset($fields['email']['language'])? $fields['email']['language'] : array())) }}	
						</td>
						<td>{{ $row->email }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('First Name', (isset($fields['first_name']['language'])? $fields['first_name']['language'] : array())) }}	
						</td>
						<td>{{ $row->first_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Last Name', (isset($fields['last_name']['language'])? $fields['last_name']['language'] : array())) }}	
						</td>
						<td>{{ $row->last_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Address', (isset($fields['address']['language'])? $fields['address']['language'] : array())) }}	
						</td>
						<td>{{ $row->address }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('City', (isset($fields['city']['language'])? $fields['city']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->city,'city','1:tb_cities:id:city_name') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('State', (isset($fields['state']['language'])? $fields['state']['language'] : array())) }}	
						</td>
						<td>{!! SiteHelpers::gridDisplayView($row->state,'state','1:tb_states:id:state_name|state_code') !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Country', (isset($fields['country']['language'])? $fields['country']['language'] : array())) }}	
						</td>
						<td>{{ $row->country }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Phone', (isset($fields['phone']['language'])? $fields['phone']['language'] : array())) }}	
						</td>
						<td>{{ $row->phone }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Phone 2', (isset($fields['phone_2']['language'])? $fields['phone_2']['language'] : array())) }}	
						</td>
						<td>{{ $row->phone_2 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Alternate Email', (isset($fields['alternate_email']['language'])? $fields['alternate_email']['language'] : array())) }}	
						</td>
						<td>{{ $row->alternate_email }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Company', (isset($fields['company']['language'])? $fields['company']['language'] : array())) }}	
						</td>
						<td>{{ $row->company }} </td>
						
					</tr>

					@unless(SiteHelpers::is_customer())
						<tr>
							<td width='30%' class='label-view text-right'>
								{{ SiteHelpers::activeLang('Created At', (isset($fields['created_at']['language'])? $fields['created_at']['language'] : array())) }}
							</td>
							<td>{{ $row->created_at }} </td>

						</tr>

						<tr>
							<td width='30%' class='label-view text-right'>
								{{ SiteHelpers::activeLang('Updated At', (isset($fields['updated_at']['language'])? $fields['updated_at']['language'] : array())) }}
							</td>
							<td>{{ $row->updated_at }} </td>

						</tr>


						<tr>
							<td width='30%' class='label-view text-right'>
								{{ SiteHelpers::activeLang('UID', (isset($fields['user_id']['language'])? $fields['user_id']['language'] : array())) }}
							</td>
							<td>{{ $row->user_id }} </td>

						</tr>
				

						<tr>
							<td width='30%' class='label-view text-right'>
								{{ SiteHelpers::activeLang('Entry By', (isset($fields['entry_by']['language'])? $fields['entry_by']['language'] : array())) }}
							</td>
							<td>{!! SiteHelpers::gridDisplayView($row->entry_by,'entry_by','1:tb_users:id:first_name|last_name') !!} </td>

						</tr>
					@endunless
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Customer Company Rc Number', (isset($fields['customer_company_rc_number']['language'])? $fields['customer_company_rc_number']['language'] : array())) }}	
						</td>
						<td>{{ $row->customer_company_rc_number }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Customer Company Director Name', (isset($fields['customer_company_director_name']['language'])? $fields['customer_company_director_name']['language'] : array())) }}	
						</td>
						<td>{{ $row->customer_company_director_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Customer Company Director Name 2', (isset($fields['customer_company_director_name_2']['language'])? $fields['customer_company_director_name_2']['language'] : array())) }}	
						</td>
						<td>{{ $row->customer_company_director_name_2 }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Customer Company Opening Hours', (isset($fields['customer_company_opening_hours']['language'])? $fields['customer_company_opening_hours']['language'] : array())) }}	
						</td>
						<td>{{ $row->customer_company_opening_hours }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>
							{{ SiteHelpers::activeLang('Customer Preferred Pickup Times', (isset($fields['customer_preferred_pickup_times']['language'])? $fields['customer_preferred_pickup_times']['language'] : array())) }}	
						</td>
						<td>{{ $row->customer_preferred_pickup_times }} </td>
						
					</tr>
				
		</tbody>	
	</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop