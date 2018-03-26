@extends ('layout.nav')
@section ('title')
    Terminals
@endsection
@section ('pagetitle')
    Terminals
@endsection
@section ('pageContent')

<div class="col-md-2">
    <input type="button" class="btn btn-success" value="Add Terminal" data-toggle="modal" data-target="#addModal"/>
</div>

<br>
<br>
<br>

<div class="col-md-11">
    <table class="table " id="tblTerminal">
        <thead style="background-color: #81D4FA">
            <tr>
                <th>Name</th>
                <th>Computer Name</th>
                <th>IP Address</th>
                <th>Type</th>
                <th>Loop Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($terminals as $terminal)
            <tr>
                <td>{{$terminal->name}}</td>
                <td>{{$terminal->comp_name}}</td>
                <td>{{$terminal->ipadd}}</td>
                <td>
                  @if($terminal->type == 1)
                    Entry
                  @else
                    Exit
                  @endif
                </td>
                <td>
                  @if($terminal->loop_status == 1)
                    Active
                  @else
                    Inactive
                  @endif
                </td>
                <td><input type="button" value="Edit" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$terminal->terminal_id}}"/>&nbsp;<input type="button" value="Delete" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$terminal->terminal_id}}""/></td>
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
        <h4 class="modal-title">Add Terminal</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <table>
                <tbody>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Name: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtName" /></td>
                        <td>&nbsp;<label class="text text-danger" id="lblExist">*Name already used.</label>
                          <label class="text text-success" id="lblSuccess">Name is available.</label></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Computer Name: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtComp" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>IP Address: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtIp" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Type: </label></td>
                        <td style="width: 175px">
                          <select class="form-control" id="txtType">
                            <option value="1">Entry</option>
                            <option value="0">Exit</option>
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
  
  @foreach($terminals as $terminal)
  <input type="text" id="txtTemp{{$terminal->terminal_id}}" value="{{$terminal->name}}" hidden/>

  <!-- Modal Edit -->
  <div id="editModal{{$terminal->terminal_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Terminal</h4>
        </div>
        <!-- Modal Body-->
        <div class="modal-body">
          <div class="row">
              <table>
                  <tbody>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Name: </label></td>
                          <td style="width: 175px"><input type="text" class="form-control" id="txtName{{$terminal->terminal_id}}" value="{{$terminal->name}}"/></td>
                          <td>&nbsp;<label class="text text-danger" id="lblExist{{$terminal->terminal_id}}" hidden>*Name already used.</label>
                            <label class="text text-success" id="lblSuccess{{$terminal->terminal_id}}" hidden>Name is available.</label></td>
                      </tr>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Computer Name: </label></td>
                          <td style="width: 175px"><input type="text" class="form-control " id="txtComp{{$terminal->terminal_id}}" value="{{$terminal->comp_name}}"/></td>
                      </tr>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>IP Address: </label></td>
                          <td style="width: 175px"><input type="text" class="form-control" id="txtIp{{$terminal->terminal_id}}" value="{{$terminal->ipadd}}" /></td>
                      </tr>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Type: </label></td>
                          <td style="width: 175px">
                            <select class="form-control" id="txtType{{$terminal->terminal_id}}">
                              @if($terminal->type == 1)
                                <option value="1" selected="selected">Entry</option>
                                <option value="0">Exit</option>
                              @else
                                <option value="1">Entry</option>
                                <option value="0" selected="selected">Exit</option>
                              @endif
                            </select>
                          </td> 
                      </tr> 
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Loop Status: </label></td>
                          <td style="width: 175px">
                            <select class="form-control" id="txtLoop{{$terminal->terminal_id}}">
                              @if($terminal->loop_status == 1)
                                <option value="1" selected="selected">Active</option>
                                <option value="0">Inactive</option>
                              @else
                                <option value="1">Active</option>
                                <option value="0" selected="selected">Inactive</option>
                              @endif
                            </select>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
          
        </div>
        <!-- Modal Body-->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="btnUpdate{{$terminal->terminal_id}}" onclick="edit({{$terminal->terminal_id}});">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Close</button>
        </div>
      </div>
      <!-- Modal content-->
    </div>
  </div>
  <!-- Modal Edit -->


  <!-- Modal Delete -->
  <div id="deleteModal{{$terminal->terminal_id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa fa-warning"></span>&nbsp;&nbsp;&nbsp;Delete Terminal: {{$terminal->name}}</h4>
        </div>
        <!-- Modal Body-->
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10">
              <p>Are you sure you want to delete this item?</p>
            </div>
          </div>
          
        </div>
        <!-- Modal Body-->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="del({{$terminal->terminal_id}});">Confirm</button>
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
    var ctr = 0;
    var rname = $("#txtName").val();
    var table = document.getElementById('tblTerminal');
    for (var r = 1, n = table.rows.length; r < n; r++) {
      if(rname==table.rows[r].cells[0].innerHTML){
        ctr++;
      }
    }

    if(rname){
      if(ctr > 0){
        document.getElementById("txtName").style.backgroundColor = "salmon";
        document.getElementById("lblExist").hidden = false;
        document.getElementById("lblSuccess").hidden = true;
        document.getElementById("btnAdd").disabled = true;
      } else {
        document.getElementById("txtName").style.backgroundColor = "white";
        document.getElementById("lblExist").hidden = true;
        document.getElementById("lblSuccess").hidden = false;
        document.getElementById("btnAdd").disabled = false;
      }
    } else {
      document.getElementById("lblExist").hidden = true;
      document.getElementById("lblSuccess").hidden = true;
      document.getElementById("btnAdd").disabled = true;
    }

    if($("#txtName").val() && $("#txtComp").val() && $("#txtIp").val() && $("#txtType").val() && ctr == 0){
      document.getElementById("btnAdd").disabled = false;
    } else {
      document.getElementById("btnAdd").disabled = true;
    }

  }, 100);


  @foreach($terminals as $terminal)
    setInterval(function(){ 
    var ctr = 0;
    var rname = $("#txtName{{$terminal->terminal_id}}").val();
    var table = document.getElementById('tblTerminal');
    for (var r = 1, n = table.rows.length; r < n; r++) {
      if(rname==table.rows[r].cells[0].innerHTML && rname != $("#txtTemp{{$terminal->terminal_id}}").val()){
        ctr++;
      }
    }

    if(rname){
      if(ctr > 0){
        document.getElementById("txtName{{$terminal->terminal_id}}").style.backgroundColor = "salmon";
        document.getElementById("lblExist{{$terminal->terminal_id}}").hidden = false;
        document.getElementById("lblSuccess{{$terminal->terminal_id}}").hidden = true;
        document.getElementById("btnUpdate{{$terminal->terminal_id}}").disabled = true;
      } else{
        document.getElementById("txtName{{$terminal->terminal_id}}").style.backgroundColor = "white";
        document.getElementById("lblExist{{$terminal->terminal_id}}").hidden = true;
        document.getElementById("lblSuccess{{$terminal->terminal_id}}").hidden = false;
        document.getElementById("btnUpdate{{$terminal->terminal_id}}").disabled = false;
      }
    } else {
      document.getElementById("lblExist{{$terminal->terminal_id}}").hidden = true;
      document.getElementById("lblSuccess{{$terminal->terminal_id}}").hidden = true;
      document.getElementById("btnUpdate{{$terminal->terminal_id}}").disabled = true;
    }

    if($("#txtName{{$terminal->terminal_id}}").val() && $("#txtComp{{$terminal->terminal_id}}").val() && $("#txtIp{{$terminal->terminal_id}}").val() && $("#txtLoop{{$terminal->terminal_id}}").val() && $("#txtType{{$terminal->terminal_id}}").val() && ctr == 0){
      document.getElementById("btnUpdate{{$terminal->terminal_id}}").disabled = false;
    } else {
      document.getElementById("btnUpdate{{$terminal->terminal_id}}").disabled = true;
    }

  }, 100);
  @endforeach


  function edit(id){
    var terminal = {

          tid: id,
          tname: $("#txtName"+id).val(),
          tcomp: $("#txtComp"+id).val(),
          tip: $("#txtIp"+id).val(),
          tloop: $("#txtLoop"+id).val(),
          ttype: $("#txtType"+id).val()

        };


    // ===================== AJAX ===================== 

        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: '/Terminal/toEdit/obj',
          type: 'get',
          data: {
            terminal,
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
          url: '/Terminal/delete/'+id,
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
      $('#tblTerminal').DataTable();

      $("#btnClose").click(function(){
        $(".namecode").val("");
        document.getElementById("txtName").style.backgroundColor = "white";
      });

      $("#btnAdd").click(function(){

        var terminal = {
          tname: $("#txtName").val(),
          tcomp: $("#txtComp").val(),
          tip: $("#txtIp").val(),
          tloop: 0,
          ttype: $("#txtType").val()
        };
        $(".namecode").val("");

        // ===================== AJAX ===================== 

            $.ajaxSetup({
              headers:
              {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
            });
            $.ajax({
              url: '/Terminal/add/obj',
              type: 'get',
              data: {
                terminal,
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