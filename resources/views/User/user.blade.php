@extends ('layout.nav')
@section ('title')
    Users
@endsection
@section ('pagetitle')
    Users
@endsection
@section ('pageContent')

<div class="col-md-2">
    <input type="button" class="btn btn-success" value="Add Terminal" data-toggle="modal" data-target="#addModal"/>
</div>

<br>
<br>
<br>

<div class="col-md-11">
    <table class="table " id="tblUser">
        <thead style="background-color: #81D4FA">
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Type</th>
                <th>Contact Number</th>
                <th>User Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->fname}} {{$user->lname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->contact_no}}</td>
                <td>{{$user->userlevel->name}}</td>
                <td><input type="button" value="Edit" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$user->id}}"/>&nbsp;<input type="button" value="Delete" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$user->id}}""/></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Modal Add -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <table>
                <tbody>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Username: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtUName" /></td>
                        <td>&nbsp;<label class="text text-danger" id="lblExist">*Name already used.</label>
                          <label class="text text-success" id="lblSuccess">Name is available.</label></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Password: </label></td>
                        <td style="width: 175px"><input type="password" class="form-control namecode" id="txtPass" /></td><td>&nbsp;<label class="text text-danger" id="lblNot">*Password did not match.</label>
                          <label class="text text-success" id="lblMatch">Password Matched.</label></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Comfirm Password: </label></td>
                        <td style="width: 175px"><input type="password" class="form-control namecode" id="txtCPass" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>First Name: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtFname" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Last Name: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtLname" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Contact Number: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtCno" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>User Level: </label></td>
                        <td style="width: 175px">
                          <select class="form-control" id="txtLvl">
                            @foreach($levels as $level)
                              <option value="{{$level->id}}">{{$level->name}}</option>
                            @endforeach
                          </select>
                        </td> 
                    </tr> 
                </tbody>
            </table>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="btnAdd" disabled>Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal Add -->

<div id="editModalDiv">
  
  @foreach($users as $user)
  <input type="text" id="txtTemp{{$user->id}}" value="{{$user->name}}" hidden/>

  <!-- Modal Edit -->
  <div id="editModal{{$user->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit User</h4>
        </div>
        <!-- Modal Body-->
        <div class="modal-body">
          <div class="row">
              <table>
                  <tbody>
                      <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Username: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtUName{{$user->id}}" /></td>
                        <td>&nbsp;<label class="text text-danger" id="lblExist{{$user->id}}">*Name already used.</label>
                          <label class="text text-success" id="lblSuccess{{$user->id}}">Name is available.</label></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Password: </label></td>
                        <td style="width: 175px"><input type="password" class="form-control namecode" id="txtPass{{$user->id}}" /></td>
                        <td>&nbsp;<label class="text text-danger" id="lblNot{{$user->id}}">*Password did not match.</label>
                          <label class="text text-success" id="lblMatch{{$user->id}}">Password Matched.</label></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Comfirm Password: </label></td>
                        <td style="width: 175px"><input type="password" class="form-control namecode" id="txtCPass{{$user->id}}" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>First Name: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtFname{{$user->id}}" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Last Name: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtLname{{$user->id}}" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Contact Number: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtCno{{$user->id}}" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>User Level: </label></td>
                        <td style="width: 175px">
                          <select class="form-control" id="txtLvl{{$user->id}}">
                            @foreach($levels as $level)
                              <option value="{{$level->id}}">{{$level->name}}</option>
                            @endforeach
                          </select>
                        </td> 
                    </tr>
                  </tbody>
              </table>
          </div>
          
        </div>
        <!-- Modal Body-->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="btnUpdate{{$user->id}}" onclick="edit({{$user->id}});">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Close</button>
        </div>
      </div>
      <!-- Modal content-->
    </div>
  </div>
  <!-- Modal Edit -->


  <!-- Modal Delete -->
  <div id="deleteModal{{$user->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa fa-warning"></span>&nbsp;&nbsp;&nbsp;Delete Terminal: {{$user->Username}}</h4>
        </div>
        <!-- Modal Body-->
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10">
              <p>Are you sure you want to delete this User?</p>
            </div>
          </div>
          
        </div>
        <!-- Modal Body-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="del({{$user->id}});">Confirm</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Cancel</button>
        </div>
      </div>
      <!-- Modal content-->
    </div>
  </div>
  <!-- Modal Delete -->
  @endforeach
  
</div>


<script>

  setInterval(function(){ 
    var ctr = 0, confirmPass = 0;
    var rname = $("#txtUName").val();
    var table = document.getElementById('tblUser');
    for (var r = 1, n = table.rows.length; r < n; r++) {
      if(rname==table.rows[r].cells[0].innerHTML){
        ctr++;
      }
    }

    if($("#txtPass").val() == $("#txtCPass").val()){
      document.getElementById("txtCPass").style.backgroundColor = "salmon";
      document.getElementById("lblNot").hidden = false;
      document.getElementById("lblMatch").hidden = true;
      document.getElementById("btnAdd").disabled = true;
    } else {
      document.getElementById("txtCPass").style.backgroundColor = "white";
      document.getElementById("lblNot").hidden = true;
      document.getElementById("lblMatch").hidden = false;
      corfirmPadd = 1;
    }

    if(rname){
      if(ctr > 0){
        document.getElementById("txtUName").style.backgroundColor = "salmon";
        document.getElementById("lblExist").hidden = false;
        document.getElementById("lblSuccess").hidden = true;
        document.getElementById("btnAdd").disabled = true;
      } else {
        document.getElementById("txtUName").style.backgroundColor = "white";
        document.getElementById("lblExist").hidden = true;
        document.getElementById("lblSuccess").hidden = false;
        document.getElementById("btnAdd").disabled = false;
      }
    } else {
      document.getElementById("lblExist").hidden = true;
      document.getElementById("lblSuccess").hidden = true;
      document.getElementById("btnAdd").disabled = true;
    }

    if($("#txtUName").val() && $("#txtCno").val() && $("txtFname").val() && $("txtLname").val() && $("#txtType").val() && confirmPass == 1 && ctr == 0){
      document.getElementById("btnAdd").disabled = false;
    } else {
      document.getElementById("btnAdd").disabled = true;
    }

  }, 100);



  @foreach($users as $users)
    setInterval(function(){ 
    var ctr = 0, confirmPass = 0;
    var rname = $("#txtUName{{$users->id}}").val();
    var table = document.getElementById('tblTerminal');
    for (var r = 1, n = table.rows.length; r < n; r++) {
      if(rname==table.rows[r].cells[0].innerHTML && rname != $("#txtUTemp{{$users->id}}").val()){
        ctr++;
      }
    }

    if($("#txtPass{{$users->id}}").val() == $("#txtCPass{{$users->id}}").val()){
      document.getElementById("txtCPass{{$users->id}}").style.backgroundColor = "salmon";
      document.getElementById("lblNot{{$users->id}}").hidden = false;
      document.getElementById("lblMatch{{$users->id}}").hidden = true;
      document.getElementById("btnUpdate{{$users->id}}").disabled = true;
    } else {
      document.getElementById("txtCPass{{$users->id}}").style.backgroundColor = "white";
      document.getElementById("lblNot{{$users->id}}").hidden = true;
      document.getElementById("lblMatch{{$users->id}}").hidden = false;
      corfirmPadd = 1;
    }

    if(rname){
      if(ctr > 0){
        document.getElementById("txtName{{$users->id}}").style.backgroundColor = "salmon";
        document.getElementById("lblExist{{$users->id}}").hidden = false;
        document.getElementById("lblSuccess{{$users->id}}").hidden = true;
        document.getElementById("btnUpdate{{$users->id}}").disabled = true;
      } else{
        document.getElementById("txtName{{$users->id}}").style.backgroundColor = "white";
        document.getElementById("lblExist{{$users->id}}").hidden = true;
        document.getElementById("lblSuccess{{$users->id}}").hidden = false;
        document.getElementById("btnUpdate{{$users->id}}").disabled = false;
      }
    } else {
      document.getElementById("lblExist{{$users->id}}").hidden = true;
      document.getElementById("lblSuccess{{$users->id}}").hidden = true;
      document.getElementById("btnUpdate{{$users->id}}").disabled = true;
    }

    if($("#txtUName{{$users->id}}").val() && $("#txtCno{{$users->id}}").val() && $("txtFname{{$users->id}}").val() && $("txtLname{{$users->id}}").val() && $("#txtType{{$users->id}}").val() && confirmPass == 1 && ctr == 0){
      document.getElementById("btnUpdate{{$user->id}}").disabled = false;
    } else {
      document.getElementById("btnUpdate{{$user->id}}").disabled = true;
    }

  }, 100);
  @endforeach


  function edit(id){
    var user = {

          uid: id,
          upass: $("#txtPass"+id).val(),
          uuname: $("#txtUName"+id).val(),
          ufname: $("#txtFname"+id).val(),
          ulname: $("#txtLname"+id).val(),
          ucont: $("#txtCno"+id).val(),
          ulevel: $("#txtLvl"+id).val()

        };


    // ===================== AJAX ===================== 

        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: '/User/toEdit/obj',
          type: 'get',
          data: {
            user,
          },
          dataType:'json',
          success: function(data){
            window.location.href = '';
          }
        });

    // ===================== AJAX ===================== 
  }

  function del(id){

    // ===================== AJAX ===================== 

        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: '/User/delete/'+id,
          type: 'GET',
          data: {
            id,
          },
          dataType:'json',
          success: function(data){
            window.location.href = '';
          }
        });

    // ===================== AJAX ===================== 
  }

  $(document).ready(function(){
      $('#tblUser').DataTable();

      $("#btnClose").click(function(){
        $(".namecode").val("");
        document.getElementById("txtUName").style.backgroundColor = "white";
      });

      $("#btnAdd").click(function(){

        var user = {
          upass: $("#txtPass").val(),
          uuname: $("#txtUName").val(),
          ufname: $("#txtFname").val(),
          ulname: $("#txtLname").val(),
          ucont: $("#txtCno").val(),
          ulevel: $("#txtLvl").val()
        };
        $(".namecode").val("");

        // ===================== AJAX ===================== 

            $.ajaxSetup({
              headers:
              {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
            });
            $.ajax({
              url: '/User/add/obj',
              type: 'get',
              data: {
                user,
              },
              dataType:'json',
              success: function(data){
                window.location.href = '';
              }
            });

        // ===================== AJAX ===================== 
      });

  });
</script>
@endsection