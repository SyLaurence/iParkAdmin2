@extends ('layout.nav')
@section ('title')
    Rates
@endsection
@section ('pagetitle')
    Rates
@endsection
@section ('pageContent')
<div class="col-md-2">
    <input type="button" class="btn btn-success" value="Add Rate" data-toggle="modal" data-target="#addModal"/>
</div>

<br>
<br>
<br>

<div class="col-md-11">
    <table class="table " id="tblRate">
        <thead style="background-color: #81D4FA">
            <tr>
                <th>Name</th>
                <th>Rate Code</th>
                <th>Flatrate</th>
                <th>Grace Period in Mins.</th>
                <th>Initial Duration</th>
                <th>Per Hour Charge</th>
                <th>Overnight Charge</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @if(!empty($rates))
            @foreach($rates as $rate)
            <tr>
                <td>{{$rate->name}}</td>
                <td>{{$rate->rate_code}}</td>
                <td>{{$rate->flatrate}}</td>
                <td>{{$rate->gracemin}}</td>
                <td>{{$rate->init_duration}}</td>
                <td>{{$rate->dayhrcharge}}</td>
                <td>{{$rate->overnight}}</td>
                <td><input type="button" value="Edit" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$rate->id}}"/>&nbsp;<input type="button" value="Delete" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$rate->id}}""/></td>
            </tr>
            @endforeach
          @endif
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
        <h4 class="modal-title">Add Rate</h4>
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
                        <td style="width: 175px"><label>Rate Code: </label></td>
                        <td style="width: 175px"><input type="text" class="form-control namecode" id="txtRCode" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Flatrate: </label></td>
                        <td style="width: 175px"><input type="number" class="form-control digit" id="txtFlat" value="0" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Grace Period in Mins.: </label></td>
                        <td style="width: 175px"><input type="number" class="form-control digit" id="txtGrace" value="0" /></td> 
                    </tr> 
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Initial Duration: </label></td>
                        <td style="width: 175px"><input type="number" class="form-control digit" id="txtInit" value="0" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 175px"><label>Per Hour Charge: </label></td>
                        <td style="width: 175px"><input type="number" class="form-control digit" id="txtPer" value="0" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td style="width: 35px"></td>
                        <td style="width: 75px"><label>Overnight Charge: </label></td>
                        <td style="width: 175px"><input type="number" class="form-control digit" id="txtOver" value="0"/></td>
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
  @if(!empty($rates))
  @foreach($rates as $rate)
  <input type="text" id="txtTemp{{$rate->id}}" value="{{$rate->name}}" hidden/>

  <!-- Modal Edit -->
  <div id="editModal{{$rate->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Rate</h4>
        </div>
        <!-- Modal Body-->
        <div class="modal-body">
          <div class="row">
              <table>
                  <tbody>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Name: </label></td>
                          <td style="width: 175px"><input type="text" class="form-control" id="txtName{{$rate->id}}" value="{{$rate->name}}"/></td>
                          <td>&nbsp;<label class="text text-danger" id="lblExist{{$rate->id}}" hidden>*Name already used.</label>
                            <label class="text text-success" id="lblSuccess{{$rate->id}}" hidden>Name is available.</label></td>
                      </tr>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Rate Code: </label></td>
                          <td style="width: 175px"><input type="text" class="form-control " id="txtRCode{{$rate->id}}" value="{{$rate->rate_code}}"/></td>
                      </tr>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Flatrate: </label></td>
                          <td style="width: 175px"><input type="number" class="form-control" id="txtFlat{{$rate->id}}" value="{{$rate->flatrate}}" /></td>
                      </tr>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Grace Period in Mins.: </label></td>
                          <td style="width: 175px"><input type="number" class="form-control" id="txtGrace{{$rate->id}}" value="{{$rate->gracemin}}" /></td> 
                      </tr> 
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Initial Duration: </label></td>
                          <td style="width: 175px"><input type="number" class="form-control" id="txtInit{{$rate->id}}" value="{{$rate->init_duration}}" /></td>
                      </tr>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 175px"><label>Per Hour Charge: </label></td>
                          <td style="width: 175px"><input type="number" class="form-control" id="txtPer{{$rate->id}}" value="{{$rate->dayhrcharge}}" /></td>
                      </tr>
                      <tr style="height: 40px">
                          <td style="width: 35px"></td>
                          <td style="width: 75px"><label>Overnight Charge: </label></td>
                          <td style="width: 175px"><input type="number" class="form-control" id="txtOver{{$rate->id}}" value="{{$rate->overnight}}"/></td>
                      </tr>
                  </tbody>
              </table>
          </div>
          
        </div>
        <!-- Modal Body-->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="btnUpdate{{$rate->id}}" onclick="edit({{$rate->id}});">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Close</button>
        </div>
      </div>
      <!-- Modal content-->
    </div>
  </div>
  <!-- Modal Edit -->


  <!-- Modal Delete -->
  <div id="deleteModal{{$rate->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa fa-warning"></span>&nbsp;&nbsp;&nbsp;Delete Rate: {{$rate->name}}</h4>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="del({{$rate->id}});">Confirm</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose">Cancel</button>
        </div>
      </div>
      <!-- Modal content-->
    </div>
  </div>
  <!-- Modal Delete -->
  @endforeach
  @endif
  
</div>


<script>

  setInterval(function(){ 
    var ctr = 0;
    var rname = $("#txtName").val();
    var table = document.getElementById('tblRate');
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

    if($("#txtName").val() && $("#txtRCode").val() && $("#txtFlat").val() && $("#txtGrace").val() && $("#txtInit").val() && $("#txtPer").val() && $("#txtOver").val() && ctr == 0){
      document.getElementById("btnAdd").disabled = false;
    } else {
      document.getElementById("btnAdd").disabled = true;
    }

  }, 100);

  @if(!empty($rates))
  @foreach($rates as $rate)
    setInterval(function(){ 
    var ctr = 0;
    var rname = $("#txtName{{$rate->id}}").val();
    var table = document.getElementById('tblRate');
    for (var r = 1, n = table.rows.length; r < n; r++) {
      if(rname==table.rows[r].cells[0].innerHTML && rname != $("#txtTemp{{$rate->id}}").val()){
        ctr++;
      }
    }

    if(rname){
      if(ctr > 0){
        document.getElementById("txtName{{$rate->id}}").style.backgroundColor = "salmon";
        document.getElementById("lblExist{{$rate->id}}").hidden = false;
        document.getElementById("lblSuccess{{$rate->id}}").hidden = true;
        document.getElementById("btnUpdate{{$rate->id}}").disabled = true;
      } else{
        document.getElementById("txtName{{$rate->id}}").style.backgroundColor = "white";
        document.getElementById("lblExist{{$rate->id}}").hidden = true;
        document.getElementById("lblSuccess{{$rate->id}}").hidden = false;
        document.getElementById("btnUpdate{{$rate->id}}").disabled = false;
      }
    } else {
      document.getElementById("lblExist{{$rate->id}}").hidden = true;
      document.getElementById("lblSuccess{{$rate->id}}").hidden = true;
      document.getElementById("btnUpdate{{$rate->id}}").disabled = true;
    }

    if($("#txtName{{$rate->id}}").val() && $("#txtRCode{{$rate->id}}").val() && $("#txtFlat{{$rate->id}}").val() && $("#txtGrace{{$rate->id}}").val() && $("#txtInit{{$rate->id}}").val() && $("#txtPer{{$rate->id}}").val() && $("#txtOver{{$rate->id}}").val() && ctr == 0){
      document.getElementById("btnUpdate{{$rate->id}}").disabled = false;
    } else {
      document.getElementById("btnUpdate{{$rate->id}}").disabled = true;
    }

  }, 100);
  @endforeach
  @endif


  function edit(id){
    var Rate = {
          rid: id,
          rname: $("#txtName"+id).val(),
          rcode: $("#txtRCode"+id).val(),
          rflat: $("#txtFlat"+id).val(),
          rgrace: $("#txtGrace"+id).val(),
          rinit: $("#txtInit"+id).val(),
          rper: $("#txtPer"+id).val(),
          rover: $("#txtOver"+id).val()
        };


    // ===================== AJAX ===================== 

        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: '/Rate/toEdit/obj',
          type: 'get',
          data: {
            Rate,
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
          url: '/Rate/delete/'+id,
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
      $('#tblRate').DataTable();

      $("#btnClose").click(function(){
        $(".digit").val(0);
        $(".namecode").val("");
        document.getElementById("txtName").style.backgroundColor = "white";
      });

      $("#btnAdd").click(function(){

        var Rate = {
          rname: $("#txtName").val(),
          rcode: $("#txtRCode").val(),
          rflat: $("#txtFlat").val(),
          rgrace: $("#txtGrace").val(),
          rinit: $("#txtInit").val(),
          rper: $("#txtPer").val(),
          rover: $("#txtOver").val()
        };
        $(".digit").val(0);
        $(".namecode").val("");

        // ===================== AJAX ===================== 

            $.ajaxSetup({
              headers:
              {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
            });
            $.ajax({
              url: '/Rate/add/obj',
              type: 'get',
              data: {
                Rate,
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