@extends ('layout.nav')
@section ('title')
    Users
@endsection
@section ('pagetitle')
    Users
@endsection
@section ('pageContent')

<div class="col-md-2">
    <input type="button" class="btn btn-success" value="Add User" data-toggle="modal" data-target="#addModal"/>
</div>

<br>
<br>
<br>

<div class="col-md-11">
    <table class="table " id="tblUser">
        <thead style="background-color: #81D4FA">
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->fname}}</td>
                <td>{{$user->lname}}</td>
                <td><input type="button" value="Privilege" class="btn btn-success" data-toggle="modal" data-target="#privModal{{$user->admin_id}}"/>&nbsp;<input type="button" value="Edit" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$user->admin_id}}"/>&nbsp;<input type="button" value="Delete" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$user->admin_id}}""/></td>
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
                        <td>&nbsp;<label class="text text-danger" id="lblExist" hidden>*Name already used.</label>
                          <label class="text text-success" id="lblSuccess" hidden>Name is available.</label></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Password: </label></td>
                        <td style="width: 175px"><input type="password" class="form-control namecode" id="txtPass" /></td><td>&nbsp;<label class="text text-danger" id="lblNot" hidden>*Password did not match.</label>
                          <label class="text text-success" id="lblMatch" hidden>Password Matched.</label></td>
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
                   <!--  <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Contact Number: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtCno" /></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="btnAdd">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal Add -->

<div id="editModalDiv">
  
  @foreach($users as $user)
  <input type="text" id="txtTemp{{$user->admin_id}}" value="{{$user->name}}" hidden/>

  <!-- Modal Edit -->
  <div id="editModal{{$user->admin_id}}" class="modal fade" role="dialog">
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
                        <td style="width: 175px"><input type="text" class="form-control namecode" value="{{$user->username}}" id="txtUName{{$user->admin_id}}" /></td>
                        <td>&nbsp;<label class="text text-danger" id="lblExist{{$user->admin_id}}" hidden>*Name already used.</label>
                          <label class="text text-success" id="lblSuccess{{$user->admin_id}}" hidden>Name is available.</label></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Password: </label></td>
                        <td style="width: 175px"><input type="password" class="form-control namecode" id="txtPass{{$user->admin_id}}" /></td>
                        <td>&nbsp;<label class="text text-danger" id="lblNot{{$user->admin_id}}" hidden>*Password did not match.</label>
                          <label class="text text-success" id="lblMatch{{$user->admin_id}}" hidden>Password Matched.</label></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Comfirm Password: </label></td>
                        <td style="width: 175px"><input type="password" class="form-control namecode" id="txtCPass{{$user->admin_id}}" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>First Name: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" value="{{$user->fname}}" id="txtFname{{$user->admin_id}}" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Last Name: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" value="{{$user->lname}}" id="txtLname{{$user->admin_id}}" /></td>
                    </tr>
                    <!-- <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Contact Number: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtCno{{$user->admin_id}}" /></td>
                    </tr> -->
                  </tbody>
              </table>
          </div>
          
        </div>
        <!-- Modal Body-->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="btnUpdate{{$user->admin_id}}" onclick="edit({{$user->admin_id}});">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Close</button>
        </div>
      </div>
      <!-- Modal content-->
    </div>
  </div>
  <!-- Modal Edit -->


  <!-- Modal Delete -->
  <div id="deleteModal{{$user->admin_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa fa-warning"></span>&nbsp;&nbsp;&nbsp;Delete Terminal: {{$user->username}}</h4>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="del({{$user->admin_id}});">Confirm</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Cancel</button>
        </div>
      </div>
      <!-- Modal content-->
    </div>
  </div>
  <!-- Modal Delete -->

  <!-- Modal Privilege -->
  <div id="privModal{{$user->admin_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa fa-list-ul"></span>&nbsp;&nbsp;&nbsp;Privileges for user: {{$user->username}}</h4>
        </div>
        <!-- Modal Body-->
        <div class="modal-body">

          <table>
            <tbody>
              <tr>
                <td width="100px"></td>
                <td>
                  <label>Dashboard Chart</label><br>
                  @if(strpos($user->privileges, "Chart1") !== false)
                  <input type="checkbox" id="chkChart1{{$user->admin_id}}" checked>&nbsp;View Chart 1<br>
                  @else
                  <input type="checkbox" id="chkChart1{{$user->admin_id}}">&nbsp;View Chart 1<br>
                  @endif
                  @if(strpos($user->privileges, "Chart2") !== false)
                  <input type="checkbox" id="chkChart2{{$user->admin_id}}" checked>&nbsp;View Chart 2<br>
                  @else
                  <input type="checkbox" id="chkChart2{{$user->admin_id}}">&nbsp;View Chart 2<br>
                  @endif
                  @if(strpos($user->privileges, "Chart3") !== false)
                  <input type="checkbox" id="chkChart3{{$user->admin_id}}" checked>&nbsp;View Chart 3<br>
                  @else
                  <input type="checkbox" id="chkChart3{{$user->admin_id}}">&nbsp;View Chart 3<br>
                  @endif
                </td>
                <td width="100px"></td>
                <td>
                  <label>Terminals</label><br>
                  @if(strpos($user->privileges, "ViewTerm") !== false)
                  <input type="checkbox" id="chkViewTerm{{$user->admin_id}}" checked>&nbsp;View Terminals<br>
                  @else
                  <input type="checkbox" id="chkViewTerm{{$user->admin_id}}">&nbsp;View Terminals<br>
                  @endif
                  @if(strpos($user->privileges, "AddTerm") !== false)
                  <input type="checkbox" id="chkAddTerm{{$user->admin_id}}" checked>&nbsp;Add Terminals<br>
                  @else
                  <input type="checkbox" id="chkAddTerm{{$user->admin_id}}">&nbsp;Add Terminals<br>
                  @endif
                  @if(strpos($user->privileges, "EditTerm") !== false)
                  <input type="checkbox" id="chkEditTerm{{$user->admin_id}}" checked>&nbsp;Edit Terminals<br>
                  @else
                  <input type="checkbox" id="chkEditTerm{{$user->admin_id}}">&nbsp;Edit Terminals<br>
                  @endif
                  @if(strpos($user->privileges, "DelTerm") !== false)
                  <input type="checkbox" id="chkDelTerm{{$user->admin_id}}" checked>&nbsp;Delete Terminals<br>
                  @else
                  <input type="checkbox" id="chkDelTerm{{$user->admin_id}}">&nbsp;Delete Terminals<br>
                  @endif
                </td>
              </tr>
              <tr height="50px"></tr>
              <tr>
                <td width="100px"></td>
                <td>
                  <label>Search Transactions</label><br>
                  @if(strpos($user->privileges, "ViewTran") !== false)
                  <input type="checkbox" id="chkViewTran{{$user->admin_id}}" checked>&nbsp;View Transaction<br>
                  @else
                  <input type="checkbox" id="chkViewTran{{$user->admin_id}}">&nbsp;View Transaction<br>
                  @endif
                  @if(strpos($user->privileges, "Manual") !== false)
                  <input type="checkbox" id="chkManual{{$user->admin_id}}" checked>&nbsp;Manual Entry<br>
                  @else
                  <input type="checkbox" id="chkManual{{$user->admin_id}}">&nbsp;Manual Entry<br>
                  @endif
                  @if(strpos($user->privileges, "EditTran") !== false)
                  <input type="checkbox" id="chkEditTran{{$user->admin_id}}" checked>&nbsp;Edit Transaction<br>
                  @else
                  <input type="checkbox" id="chkEditTran{{$user->admin_id}}">&nbsp;Edit Transaction<br>
                  @endif
                </td>
                <td width="100px"></td>
                <td>
                  <label>Users</label><br>
                  @if(strpos($user->privileges, "ViewUser") !== false)
                  <input type="checkbox" id="chkViewUser{{$user->admin_id}}" checked>&nbsp;View Users<br>
                  @else
                  <input type="checkbox" id="chkViewUser{{$user->admin_id}}">&nbsp;View Users<br>
                  @endif
                  @if(strpos($user->privileges, "AddUser") !== false)
                  <input type="checkbox" id="chkAddUser{{$user->admin_id}}" checked>&nbsp;Add Users<br>
                  @else
                  <input type="checkbox" id="chkAddUser{{$user->admin_id}}">&nbsp;Add Users<br>
                  @endif
                  @if(strpos($user->privileges, "EditUser") !== false)
                  <input type="checkbox" id="chkEditUser{{$user->admin_id}}" checked>&nbsp;Edit Users<br>
                  @else
                  <input type="checkbox" id="chkEditUser{{$user->admin_id}}">&nbsp;Edit Users<br>
                  @endif
                  @if(strpos($user->privileges, "DelUser") !== false)
                  <input type="checkbox" id="chkDelUser{{$user->admin_id}}" checked>&nbsp;Delete Users<br>
                  @else
                  <input type="checkbox" id="chkDelUser{{$user->admin_id}}">&nbsp;Delete Users<br>
                  @endif
                </td>
              </tr>
              <tr height="50px"></tr>
              <tr>
                <td width="100px"></td>
                <td>
                  <label>Reports</label><br>
                  @if(strpos($user->privileges, "Report") !== false)
                  <input type="checkbox" id="chkReport{{$user->admin_id}}" checked>&nbsp;Generate Reports<br>
                  @else
                  <input type="checkbox" id="chkReport{{$user->admin_id}}">&nbsp;Generate Reports<br>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>

        </div>
        <!-- Modal Body-->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" onclick="priv({{$user->admin_id}});">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Cancel</button>
        </div>
      </div>
      <!-- Modal content-->
    </div>
  </div>
  <!-- Modal Privilege -->

  @endforeach
</div>


<script>
  // Validation
  // setInterval(function(){ 
  //   var ctr = 0, confirmPass = 0;
  //   var rname = $("#txtUName").val();
  //   var table = document.getElementById('tblUser');
  //   for (var r = 1, n = table.rows.length; r < n; r++) {
  //     if(rname==table.rows[r].cells[0].innerHTML){
  //       ctr++;
  //     }
  //   }

  //   if($("#txtPass").val() == $("#txtCPass").val()){
  //     document.getElementById("txtCPass").style.backgroundColor = "salmon";
  //     document.getElementById("lblNot").hidden = false;
  //     document.getElementById("lblMatch").hidden = true;
  //     document.getElementById("btnAdd").disabled = true;
  //   } else {
  //     document.getElementById("txtCPass").style.backgroundColor = "white";
  //     document.getElementById("lblNot").hidden = true;
  //     document.getElementById("lblMatch").hidden = false;
  //     corfirmPadd = 1;
  //   }

  //   if(rname){
  //     if(ctr > 0){
  //       document.getElementById("txtUName").style.backgroundColor = "salmon";
  //       document.getElementById("lblExist").hidden = false;
  //       document.getElementById("lblSuccess").hidden = true;
  //       document.getElementById("btnAdd").disabled = true;
  //     } else {
  //       document.getElementById("txtUName").style.backgroundColor = "white";
  //       document.getElementById("lblExist").hidden = true;
  //       document.getElementById("lblSuccess").hidden = false;
  //       document.getElementById("btnAdd").disabled = false;
  //     }
  //   } else {
  //     document.getElementById("lblExist").hidden = true;
  //     document.getElementById("lblSuccess").hidden = true;
  //     document.getElementById("btnAdd").disabled = true;
  //   }

  //   if($("#txtUName").val() && $("#txtCno").val() && $("txtFname").val() && $("txtLname").val() && $("#txtType").val() && confirmPass == 1 && ctr == 0){
  //     document.getElementById("btnAdd").disabled = false;
  //   } else {
  //     document.getElementById("btnAdd").disabled = true;
  //   }

  // }, 100);

  // @foreach($users as $users)
  //   setInterval(function(){ 
  //   var ctr = 0, confirmPass = 0;
  //   var rname = $("#txtUName{{$users->id}}").val();
  //   var table = document.getElementById('tblTerminal');
  //   for (var r = 1, n = table.rows.length; r < n; r++) {
  //     if(rname==table.rows[r].cells[0].innerHTML && rname != $("#txtUTemp{{$users->id}}").val()){
  //       ctr++;
  //     }
  //   }

  //   if($("#txtPass{{$users->id}}").val() == $("#txtCPass{{$users->id}}").val()){
  //     document.getElementById("txtCPass{{$users->id}}").style.backgroundColor = "salmon";
  //     document.getElementById("lblNot{{$users->id}}").hidden = false;
  //     document.getElementById("lblMatch{{$users->id}}").hidden = true;
  //     document.getElementById("btnUpdate{{$users->id}}").disabled = true;
  //   } else {
  //     document.getElementById("txtCPass{{$users->id}}").style.backgroundColor = "white";
  //     document.getElementById("lblNot{{$users->id}}").hidden = true;
  //     document.getElementById("lblMatch{{$users->id}}").hidden = false;
  //     corfirmPadd = 1;
  //   }

  //   if(rname){
  //     if(ctr > 0){
  //       document.getElementById("txtName{{$users->id}}").style.backgroundColor = "salmon";
  //       document.getElementById("lblExist{{$users->id}}").hidden = false;
  //       document.getElementById("lblSuccess{{$users->id}}").hidden = true;
  //       document.getElementById("btnUpdate{{$users->id}}").disabled = true;
  //     } else{
  //       document.getElementById("txtName{{$users->id}}").style.backgroundColor = "white";
  //       document.getElementById("lblExist{{$users->id}}").hidden = true;
  //       document.getElementById("lblSuccess{{$users->id}}").hidden = false;
  //       document.getElementById("btnUpdate{{$users->id}}").disabled = false;
  //     }
  //   } else {
  //     document.getElementById("lblExist{{$users->id}}").hidden = true;
  //     document.getElementById("lblSuccess{{$users->id}}").hidden = true;
  //     document.getElementById("btnUpdate{{$users->id}}").disabled = true;
  //   }

  //   if($("#txtUName{{$users->id}}").val() && $("#txtCno{{$users->id}}").val() && $("txtFname{{$users->id}}").val() && $("txtLname{{$users->id}}").val() && $("#txtType{{$users->id}}").val() && confirmPass == 1 && ctr == 0){
  //     document.getElementById("btnUpdate{{$user->admin_id}}").disabled = false;
  //   } else {
  //     document.getElementById("btnUpdate{{$user->admin_id}}").disabled = true;
  //   }

  // }, 100);
  // @endforeach


  function edit(id){
    var user = {

          uid: id,
          upass: $("#txtPass"+id).val(),
          uuname: $("#txtUName"+id).val(),
          ufname: $("#txtFname"+id).val(),
          ulname: $("#txtLname"+id).val()

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

    function priv(id){

      var chk = ['Chart1','Chart2','Chart3','ViewTerm','AddTerm','EditTerm','DelTerm','ViewTran','Manual','EditTran','ViewUser','AddUser','EditUser','DelUser','Report'];
      var priv = '';
      for(x = 0; x < chk.length; x++){
        var chkid = "chk"+chk[x]+id;
        if(document.getElementById(chkid).checked){
          priv+=chk[x]+',';
        }
      }
    // ===================== AJAX ===================== 
        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: '/User/priv/'+id,
          type: 'GET',
          data: {
            id,
            priv,
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
          upriv: 'sample'
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