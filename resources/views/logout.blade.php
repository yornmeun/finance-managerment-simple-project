<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				    <div col-4 >
					<div class="app-card alert alert-dismissible shadow-sm mb-1 border-left-decoration" role="alert">
				    <div class="inner">	
					
						<h4>Income Total </h4>					
					<table class="table app-table-hover  text-left" id="table">
									
									<thead>
										<tr>
										<th scope="col">BankName</th>
										<th scope="col">Banlance</th>
										</tr>
									</thead>
									<!--  -->
									
									<tbody>

										@foreach($reports as $report)
										<tr>
										<td>{{$report->bank}}</td>
										<td>{{$report->amount}}</td>
										
										</tr>
										@endforeach
										
										@foreach($sum as $total)
										<tr style="background-color: red; color:white">
										<td>Total</td>
										<td>{{$total->sum_amount}}</td>
										</tr>
										@endforeach
										
										</tbody>
										
										
									
									</table>
					</div>
			    	</div><!--//row-->
					</div>

					<div col-4 >
					<div class="app-card alert alert-dismissible shadow-sm mb-1 border-left-decoration" role="alert">
				    <div class="inner">	
						<h4>Expense Total </h4>					
					<table class="table app-table-hover  text-left" id="table">
									
									<thead>
										<tr>
										<th scope="col">BankName</th>
										<th scope="col">Banlance</th>
										</tr>
									</thead>
									<!--  -->
									
									<tbody>

										@foreach($reportexs as $report)
										<tr>
										<td>{{$report->bank}}</td>
										<td>{{$report->amount}}</td>
										
										</tr>
										@endforeach
										
										@foreach($totalexs as $totalex)
										<tr style="background-color: red; color:white">
										<td>Total</td>
										<td>{{$totalex->expen_sum}}</td>
										</tr>
										@endforeach
										
										</tbody>
										
										
									
									</table>
					</div>
			    </div><!--//row-->
					</div>
			    </div><!--//row-->