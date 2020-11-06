@extends('master')

@section('title', $title )
 @section('content')
  <div class="card">
  <div class="card-header bg-warning">
  	<h3>All Employee</h3>
  	<div class="text-right"><a href="javascript:void(0)" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addEmp">Add Employee</a></div>
  </div>
  <div class="card-body">
   <table class=" table table-hover table-stripped">
   	<thead>
   		<tr>
   			<th>Photo</th>
   			<th>Name</th>
   			<th>Phone</th>
   			<th>DOB</th>
   			<th>Address</th>
   			<th>Email</th>
   			<th>About</th>
   			<th>Action</th>
   		</tr>
   		<tbody>
   			@foreach($emp as $employee)
             <tr id="{{ $employee->id }}">
             	<td><img src="storage/app/{{ $employee->photo }}" style="height:100px;width:100px;"></td>
             	
             	<td>{{ $employee->name }}</td>
             	<td>{{ $employee->phone }}</td>
             	<td>{{ $employee->dob }}</td>
             	<td>{{ $employee->address }}</td>
             	<td>{{ $employee->email }}</td>
             	<td>{!! $employee->about !!}</td>
             	<td><button class="btn btn-success btn-xs edit"><i class="fa fa-pencil"></i></button>
             		<button class="btn btn-danger btn-xs del"><i class="fa fa-trash"></i></button></td>
             </tr>
   			@endforeach
   		</tbody>
   	</thead>
   </table>
  </div>
  <div class="card-footer">
  {{$emp->links()}}
  </div>
</div>

@include("modal")
<script type="text/javascript">
	$("#addEmployee").submit(function(event) {
		event.preventDefault();
		
		$.ajax({
			url: '{{ route("add") }}',
			type: 'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			success:function(data)
			{
			     $("tbody").prepend(data)
				$("#addEmployee")[0].reset();
				
			}
		});
		

			
	});
</script>
<script type="text/javascript">
		$(".del").click(function(event) {
           
			if(confirm("Are you want remove this employee?"))
			{
		var id=$(this).parents("tr").attr('id');
	      $.get('remove/'+id, function(data) {
			 $("#"+id).remove();

		     });
			}
			
			
		
		});
</script>
<script type="text/javascript">
		$(".edit").click(function(event) {
				
			var id=$(this).parents("tr").attr('id');
			$.get('edit/'+id, function(data) {
			 var d=$.parseJSON(data);
			 $("#id").attr('value', d.id);
			$("#name").attr('value', d.name);
			$("#phone").attr('value', d.phone);
			$("#email").attr('value', d.email);
			$("#dob").attr('value', d.dob);
			$("#address").text(d.address)
			$(".about").text(d.about)
			 $("#editEmp").modal("show");
		});


		});	
</script>
<script type="text/javascript">
	$("#editEmployee").submit(function(event) {
		event.preventDefault();
	
		$.ajax({
			url: '{{ route("update") }}',
			type: 'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			success:function(data)
			{
			    $("tbody").prepend(data)
				$("#addEmployee")[0].reset();
				
			}
		});
		

			
	});
</script>
@endsection