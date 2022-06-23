@include('admin.header')

<script>
		 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
	$(function(){
		$("#btnadd").click(function(){
			$("#modal").modal("show");
		});
        $("#btnsave").click(function(){
			var txtamount = $("#txtamount").val();
			var bankname  = $("#txtbankname").val();
			var txtdate   = $("#txtdate").val();
			var txtdis    = $("#txtdis").val();
			//alert (txtamount+" "+bankname+" "+txtdate+" "+txtdis);
			$.post('insertexpense',{txtamount:txtamount,bankname:bankname,txtdate:txtdate,txtdis:txtdis},function(result){
				//alert(result);
				window.location.href="expense";
			})
		});
        $("#tblexpense").on('click','#btnedit',function(){
        
        //alert ("test");
    var current_row=$(this).closest("tr");
    var expenseid = current_row.find("td").eq(0).text();
    var amount = current_row.find("td").eq(1).text();
    var bank_name = current_row.find("td").eq(2).text();
    var descrition = current_row.find("td").eq(3).text();
    var date = current_row.find("td").eq(4).text();
    //var action = current_row.find("td").eq(2).text();
   

    //alert(incomeid+" "+amount+" "+bank_name+" "+descrition+" "+date);
    //   //current_row.find("td").eq(0).html(" <input type='text' id='rowid' value='"+id+"'>");
      current_row.find("td").eq(1).html(" <input type='text' id='rowamount' value='"+amount+"'>");
      current_row.find("td").eq(2).html(" <select id='rowbankname' class='form-select form-select-sm w-auto' value='"+bank_name+"' > @foreach ($bank_name as $name ) <option>{{$name->bank_name}}</option> @endforeach");

      current_row.find("td").eq(3).html(" <input type='text' id='rowdis' value='"+descrition+"'>");
      current_row.find("td").eq(4).html(" <input type='date' id='rowdate' value='"+date+"'>");
     
     current_row.find("td").eq(5).html("<a href='#' class='cancel'id='btncancel'>Cancel</a>|<a href='#' class='save' id='btnsavechange'>SaveChange</a>");

    $(".cancel").click(function(){
         window.location.href="expense";
      //alert("test");
    });
    $("#btnsavechange").click(function(){
        //alert("test");
      var expenseid=$(this).closest("tr").find("td").eq(0).text();
      var amount = $("#rowamount").val();
      var bank_name = $("#rowbankname").val();
      var descrition = $("#rowdis").val();
      var date = $("#rowdate").val();
      
      //alert(incomeid+" "+amount+" "+bank_name+" "+descrition+" "+date);
    
      $.post('updateexpense',{expenseid:expenseid,amount:amount,bank_name:bank_name,descrition:descrition,date:date},function(data){
        //alert(data);
       window.location.href="expense";
      })
     
    });

    });
    $("#tblexpense").on('click','#btndelete',function(){
        var id=$(this).closest("tr").find("td").eq(0).text();

        // alert(id);
        // alert("hhh");
        $.post("deleteexpense",{expenseid:id},function(result){
          alert (result);
          window.location.href="expense";
        })
      });
		
	});
	</script>
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0">Manage Expense</h1>
					    </div>
					   

				    </div>
					<div class="row g-3 justify-content-between">
					    <div class="col-auto">
					      
					    </div>
					    <div class="col-auto">
						<a href="#" id="btnadd">+Expense</a>
					    </div>

				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					      <table class="table app-table-hover  text-left" id="tblexpense">
						  <thead>
							<tr>
								<th scope="col">ExpenseID</th>
								<th scope="col">Amount</th>
								<th scope="col">Bank Name</th>		
								<th scope="col">Description</th>
								<th scope="col">Date</th>								
								<th scope="col">Action</th>
								</tr>
								
							</thead>
                            <tbody>
										@foreach ($expenses as $data)
											<tr>
											<td>{{$data->expenseid}}</td>
											<td>{{$data->amount}}</td>
											<td>{{$data->bank}}</td>
											<td>{{$data->decrition}}</td>
											<td>{{$data->date}}</td>
											
											<td><a href='#' id="btnedit">Edit</a>|<a href='#' id="btndelete">Delete</a></td>
											</tr>
											@endforeach
											
										</tbody>
							
						  </table>
				        </div><!--//row-->
				    </div><!--//app-card-header-->

				<!-- modal -->
<div class="modal" tabindex="-1" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Income</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Amount</label>
    <input type="text" class="form-control" id="txtamount" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3 row">
  
	<div class="page-utilities col-5" class="form-control">
	<label for="exampleInputEmail1" class="form-label" >Select Bank</label>
			<select class="form-select form-select-sm w-auto" id="txtbankname">
				<option selected value="option-1">Selesct Bank Name</option>
				@foreach ($bank_name as $name )
        			<option value="{{$name->bank_name}}" > {{$name->bank_name}}</option>
            				
    			@endforeach
			</select>

		</div><!--//page-utilities-->
		<div class="page-utilities col-6">
		<label for="exampleInputEmail1"class="form-label">Select Date</label>
			<input type="date" class="form-control" id="txtdate">

		</div>
		
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Discription</label>
    <input type="text" class="form-control" id="txtdis">
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsave">Save</button>
      </div>
    </div>
  </div>
</div>
				  
@include('admin.floater');