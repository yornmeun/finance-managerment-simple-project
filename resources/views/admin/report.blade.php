@include('admin.header')
		
        <script>
			 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
	$(function(){
		$("#selectincome").hide();
		$("#selectexpense").hide();
		$("#all").click(function(){
			$("#selectincome").hide();
			$("#selectexpense").hide();
		});
		$("#expense").click(function(){
			$("#selectincome").hide();
		});
		
		$("#income").click(function(){
			$("#selectincome").show();
			$("#selectexpense").hide();

		});
		$("#expense").click(function(){
			$("#selectexpense").show();
			$("#selectincome").hide();
		});
		
	});
	
		</script>
    
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row">
					<div class="col-9"><h1 class="app-page-title">REPORT</h1></div>
								<div class="col-3" id="selectincome" >
									<div  style="text-align: right;">
										<select class="form-select" aria-label="Default select example">
										@foreach($reports as $report)
											<option value="">{{$report->date}}</option>
										@endforeach
											
											
										</select>
									</div>
								</div>
								<div class="col-3" id="selectexpense">
									<div  style="text-align: right;" >
										<select class="form-select" aria-label="Default select example">
										@foreach($reportexs as $report)
											<option value="">{{$report->date}}</option>
										@endforeach

										</select>
									</div>
								</div>
						</div>
			    
				<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active " id="all" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All Report</a>
				    <a class="flex-sm-fill text-sm-center nav-link"  id="income" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Income report</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="expense" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Expense Report</a>
				   
				</nav>
				
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
									<div class="app-card alert alert-dismissible shadow-sm mb-1 border-left-decoration" role="alert">
										<div class="inner">	
									
											<h4>Income Total </h4>					
												<table class="table app-table-hover  text-left" id="table">
													
													<thead>
														<tr>
														<th scope="col">BankName</th>
														<th scope="col">Date</th>
														<th scope="col">Banlance</th>
														</tr>
													</thead>
									
													<tbody>
														@foreach($reports as $report)
														<tr>
														<td>{{$report->bank}}</td>
														<td>{{$report->date}}</td>
														<td>{{$report->amount}}</td>
														
														</tr>
														@endforeach
														
														@foreach($sum as $total)
														<tr style="background-color: red; color:white">
															<td>Total</td>
															<td></td>
															<td>{{$total->sum_amount}}</td>
														</tr>
														@endforeach
													</tbody>
												</table>
										</div>
									</div><!--end income-->
					

					
									<div class="app-card alert alert-dismissible shadow-sm mb-1 border-left-decoration" role="alert">
										<div class="inner">	
											<h4>Expense Total </h4>					
												<table class="table app-table-hover  text-left" id="table">
													
													<thead>
														<tr>
														<th scope="col">BankName</th>
														<th scope="col">Date</th>
														<th scope="col">Banlance</th>
														</tr>
													</thead>
													<!--  -->
													
													<tbody>
														@foreach($reportexs as $report)
														<tr>
															<td>{{$report->bank}}</td>
															<td>{{$report->date}}</td>
															<td>{{$report->amount}}</td>
														</tr>
														@endforeach
														
														@foreach($totalexs as $totalex)
														<tr style="background-color: red; color:white">
														<td>Total</td>
														<td></td>
														<td>{{$totalex->expen_sum}}</td>
														</tr>
														@endforeach	
													</tbody>									
												</table>
											</div>
										</div><!--end expense-->
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						
						
			        </div><!--//tab-pane-->
			        
			        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive" >
								   
									<div class="app-card alert alert-dismissible shadow-sm mb-1 border-left-decoration" role="alert">
										<div class="inner">	
								
													
											<table class="table app-table-hover  text-left" id="table">
												
												<thead>
													<tr>
														<th scope="col">BankName</th>
														<th scope="col">Date</th>
														<th scope="col">Banlance</th>
													</tr>
												</thead>

												<tbody>

													@foreach($reports as $report)
													<tr>
														<td>{{$report->bank}}</td>
														<td>{{$report->date}}</td>
														<td>{{$report->amount}}</td>
													</tr>
													@endforeach
													
													@foreach($sum as $total)
													<tr style="background-color: red; color:white">
														<td>Total</td>
														<td></td>
														<td>{{$total->sum_amount}}</td>
													</tr>
													@endforeach
													
												</tbody>
											</table>
										</div>
									</div><!--end income-->
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
			        
			        <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
									<div class="app-card alert alert-dismissible shadow-sm mb-1 border-left-decoration" role="alert">
										<div class="inner">															
											<table class="table app-table-hover  text-left" id="table">
												
												<thead>
													<tr>
														<th scope="col">BankName</th>
														<th scope="col">Date</th>
														<th scope="col">Banlance</th>
													</tr>
												</thead>
												<!--  -->
												
												<tbody>

													@foreach($reportexs as $report)
													<tr>
														<td>{{$report->bank}}</td>
														<td>{{$report->date}}</td>
														<td>{{$report->amount}}</td>
													</tr>
													@endforeach
													
													@foreach($totalexs as $totalex)
													<tr style="background-color: red; color:white">
														<td>Total</td>
														<td></td>
														<td>{{$totalex->expen_sum}}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div><!--end Expense-->
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
			    
			    
			    
				
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
</div>	    
		@include('admin.floater');