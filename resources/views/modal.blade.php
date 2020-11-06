<!-- Employee addition-->
<div class="modal fade" id="addEmp">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header bg-dark text-warning">
        <h4 class="modal-title">Add Employee</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body bg-warning">
       <form id="addEmployee" enctype="multipart/form-data" method="post">
        @csrf
         <div class="row">
           <div class="col-sm-6 form-group">
             <label for="file">Profile Image</label>
             <input type="file" name="file"  class="form-control">

           </div>
           <div class="col-sm-6 form-group">
             <label for="name">Name</label>
             <input type="text" name="name"  class="form-control" placeholder="Your name">
           
           </div>
           <div class="col-sm-6 form-group">
             <label for="phone">Phone</label>
             <input type="text" name="phone"  class="form-control" placeholder="Your Phone Number">
           </div>
            <div class="col-sm-6 form-group">
             <label for="email">Email</label>
             <input type="email" name="email"  class="form-control" placeholder="abcd@gmail.com">
           </div>
            <div class="col-sm-6 form-group">
             <label for="dob">Date Of Birth</label>
             <input type="date" name="dob"  class="form-control" >
           </div>
            <div class="col-sm-6 form-group">
             <label for="address">Address</label>
             <textarea name="address"  class="form-control"></textarea>
           </div>
           <div class="col-sm-12">
            <label for="texteditor">About Yourself</label>
             <textarea name="about" class="form-control" id="texteditor"></textarea>
           </div>
            <div class="col-sm-12 text-right p-5">
           <button class="btn btn-primary">Add Employee</button>
           </div>
         </div>
       </form>
      </div>
        <div class="modal-footer bg-dark">
        
      </div>
    

    </div>
  </div>
</div>
<!--Update Employee data -->
<div class="modal fade" id="editEmp">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header bg-dark text-warning">
        <h4 class="modal-title">Update Employee</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body bg-warning">
       <form id="editEmployee" enctype="multipart/form-data" method="post">
        @csrf
         <div class="row">
           <div class="col-sm-6 form-group">
             <label for="file">Profile Image</label>
             <input type="hidden" name="id" id="id" value="">

           </div>
           <div class="col-sm-6 form-group">
             <label for="name">Name</label>
             <input type="text" name="name" id="name" class="form-control" placeholder="Your name" value="">
           
           </div>
           <div class="col-sm-6 form-group">
             <label for="phone">Phone</label>
             <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone Number" value="">
           </div>
            <div class="col-sm-6 form-group">
             <label for="email">Email</label>
             <input type="email" name="email" id="email" class="form-control" placeholder="abcd@gmail.com" value="">
           </div>
            <div class="col-sm-6 form-group">
             <label for="dob">Date Of Birth</label>
             <input type="date" name="dob" id="dob" class="form-control" value="">
           </div>
            <div class="col-sm-6 form-group">
             <label for="address" value="">Address</label>
             <textarea name="address" id="address" class="form-control"></textarea>
           </div>
           <div class="col-sm-12">
            <label for="texteditor">About Yourself</label>
             <textarea name="about" id="texteditor" class="form-control about"></textarea>
           </div>
            <div class="col-sm-12 text-right p-5">
           <button class="btn btn-primary">Update Employee</button>
           </div>
         </div>
       </form>
      </div>
        <div class="modal-footer bg-dark">
        
      </div>
    

    </div>
  </div>
</div>