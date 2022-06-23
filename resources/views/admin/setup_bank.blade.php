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
			//alert ("hello");
			var txtbanknumber = $("#txtnumber").val();
			var txtaccname    = $("#txtname").val();
			//alert(txtbanknumber+" "+txtaccname);
			$.post('insert',{banknumber:txtbanknumber,accname:txtaccname},function(result){
				alert(result);
				window.location.href="bank";
			})
		});

		$("#table").on('click','#btnedit',function(){
        
        //alert ("test");
        var current_row=$(this).closest("tr");
        var id = current_row.find("td").eq(0).text();
        var bankname = current_row.find("td").eq(1).text();
		var accname = current_row.find("td").eq(2).text();
       

        //alert(id+" "+bankname);
          //current_row.find("td").eq(0).html(" <input type='text' id='rowid' value='"+id+"'>");
          current_row.find("td").eq(1).html(" <input type='text' id='rowbankname' value='"+bankname+"'>");
		  current_row.find("td").eq(2).html(" <input type='text' id='rowaccname' value='"+accname+"'>");
       

       
          current_row.find("td").eq(3).html("<a href='#' class='cancel'id='cancel'>Cancel</a>|<a href='#' class='save' id='savechange'>SaveChange</a>");

        $(".cancel").click(function(){
         	window.location.href="bank";
          //alert("test");
        });
        $("#savechange").click(function(){
          var txtid=$(this).closest("tr").find("td").eq(0).text();
          var txtbankname = $("#rowbankname").val();
		  var txtaccname = $("#rowaccname").val();
        
        
          $.post('update',{id:txtid,bankname:txtbankname,accname:txtaccname},function(data){
            window.location.href="bank";
          })
         
        });

		});

		$("#table").on('click','#btndelete',function(){
        var id=$(this).closest("tr").find("td").eq(0).text();

        //alert(id);
        $.post("delete",{user_id:id},function(result){
          alert (result);
          window.location.href="bank";
        })
      });


	});

	</script>
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Dashboard</h1>
			    <a href="#" id="btnadd">Add Bank's Account</a>
			   
				<div class="app-card-header px-4 py-3" >
				        <div class="row g-3 align-items-center " >
					      <table class="table app-table-hover  text-left app-card alert alert-dismissible shadow-sm mb-1 border-left-decoration" id="table">
									
									<thead>
										<tr>
										<th scope="col">BankID</th>
										<th scope="col">Bank Name</th>
										<th scope="col">Account Name</th>										
										<th scope="col">Action</th>
										</tr>
									</thead>
									<!--  -->
									
										
										<tbody>
											<tr>
										@foreach($users as $user)
										<td>{{$user->bankid}}</td>
										<td>{{$user->banknum}}</td>
										<td>{{$user->accname}}</td>

										<td><a href='#' id="btnedit">Edit</a>|<a href='#' id="btndelete">Delete</a></td>
										</tr>
										@endforeach
										</tbody>
										
									
									</table>
					</div>
			    </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
</div>	    
<!-- modal -->
<div class="modal" tabindex="-1" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Setup Bank</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Bank Number</label>
    <input type="text" class="form-control" id="txtnumber" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Account Name</label>
    <input type="text" class="form-control" id="txtname">
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
<!-- end modal -->
		@include('admin.floater');
