@extends ('layout.nav')
@section ('title')
    Search
@endsection
@section ('pagetitle')
    Search
@endsection
@section ('pageContent')
<?php date_default_timezone_set('Asia/Hong_Kong'); ?>
  <div class="row">
    <label class="col-md-1 col-sm-2 col-xs-12 text-right"></label>
    <div class="col-md-10 col-sm-6 col-xs-12">
        <label class="col-md-1 col-sm-2 col-xs-12 text-right">From*</label>
        <div class="col-md-4">
            <input type="datetime-local" id="from" name="from" value="{{date('Y-m-d').'T'.date('H:i',strtotime('00:00'))}}" class="form-control" required/>
        </div>
        <label class="col-md-1 col-sm-2 col-xs-12 text-right">To*</label>
        <div class="col-md-4">
            <input type="datetime-local" id="to" name="to" value="{{date('Y-m-d').'T'.date('H:i')}}" class="form-control" required/>
        </div>
        <input type="button" value="Search" id="search" class="btn btn-success" />
    </div>
  </div>
  <br>
      <table class="table table-striped table-bordered" id="tblSearch">
        <thead style="background-color: #81D4FA">
          <tr>
            <th>Username</th>
            <th>Entry Image</th>
            <th>Exit Image</th>
            <th>Entry Date</th>
            <th>Payment Date</th>
            <th>Exit Date</th>
            <th>Entry Terminal</th>
            <th>Exit Terminal</th>
            <th>Load Consumed</th>
            <th>Receipt No.</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
  <script>
    $(document).ready(function(){
      $('#tblSearch').DataTable();
      $('#search').click(function(){
        var from = document.getElementById('from').value;
        var to = document.getElementById('to').value;
        // ===================== AJAX ===================== 
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: '/Search/{obj}',
            type: 'GET',
            dataType:'json',
            data: {
              from,
              to
            },
            success: function(data){
              $('#tblSearch').DataTable().rows().remove().draw();
              for(x = 0; x < data.length; x++){
                // $('#tblSearch tbody').append('<tr><td>'+data[x].user_info_id+'</td><td>'+data[x].entryimg+'</td><td>'+data[x].exitimg+'</td><td>'+data[x].created_at+'</td><td>'+data[x].paydate+'</td><td>'+data[x].updated_at+'</td><td>'+data[x].entryterminal+'</td><td>'+data[x].exitterminal+'</td><td>'+data[x].load_consumed+'.00</td><td>'+data[x].receiptnum+'</td></tr>');
                $('#tblSearch').DataTable().row.add([
                  data[x].user_info_id,
                  data[x].entryimg,
                  data[x].exitimg,
                  data[x].created_at,
                  data[x].paydate,
                  data[x].updated_at,
                  data[x].entryterminal,
                  data[x].exitterminal,
                  data[x].load_consumed,
                  data[x].receiptnum
                  ]).draw();
              }

            }
          });
        // ===================== AJAX ===================== 
      });
    });
  </script>
@endsection