@extends('layouts.master')
@section('title', 'Reports')
@section('content') 
<form action="{{route('report.generate')}}" method="POST" style="width:500px;margin-left: 400px;">
	@csrf
	<label>Select Report Type </label>
	<select class="form-control" name="report_type">
		<option value="">Select</option>
		<option value="order_report">Sales Report</option>
	   <option value="customer_report">	Customer Registered</option>
		<option value="coupons_report">	Coupons used</option>
	</select>
	<label>Select Start Date  </label>
	<input class="form-control" type="date" name="fromdate">
	<label>Select  End  Date </label>
	<input class="form-control" type="date" name="todate">
     <button class="btn btn-primary btn-sm" style="margin-top: 20px;margin-left:200px;">Submit</button>
</form>
@endsection