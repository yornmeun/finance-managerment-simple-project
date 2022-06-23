@include('admin.header')			
				

    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">User Management</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="docs-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
					                
							    </div><!--//col-->
							   <!--//dropdown-toggle-->
									   
										</ul>
								    </div><!--//dropdown-->
						        </div><!--//app-card-actions-->
								    
						    </div><!--//app-card-body-->
							
				
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
									
										<thead>
											<tr>
											<th scope="col">ID</th>
											<th scope="col">Username</th>
											<th scope="col">Gmail</th>
											<th scope="col">Phone Number</th>
											<th scope="col">Date</th>
											<th scope="col">Status</th>
											<!-- <th scope="col">Action</th> -->
											</tr>
										</thead>
										<tbody>
										@foreach ($users as $data)
											<tr>
											<td>{{$data->userid}}</td>
											<td>{{$data->username}}</td>
											<td>{{$data->gmail}}</td>
											<td>{{$data->phone_number}}</td>
											<td>{{$data->create_date}}</td>
											<td>{{$data->status}}</td>
											<!-- <td><a href='#'>Edit</a>|<a href='#'>Delete</a></td> -->
											</tr>
											@endforeach
											
										</tbody>
										</table>
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
				</div><!--//tab-content-->
							

						</div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
				</div><!--//container-fluid-->
	    	</div><!--//app-content-->  					

 
    @include('admin.floater');

