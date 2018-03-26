@extends ('layout.nav')
@section ('title')
    Reports
@endsection
@section ('pagetitle')
    Reports
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
        <input type="button" value="Generate" id="print" class="btn btn-success" />
        <a id="printLink" href="/Report/print/23123s" target="_blank" hidden></a>
    </div>
  </div>
  <br>
  <div class="row">
    <label class="col-md-3 col-sm-2 col-xs-12 text-right"></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select name="cmbxBusCompany" id="drpReport" class="form-control" required>
        <option value="No">Choose..</option>
        <option value="BIR"> BIR Report</option>
      </select>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $('#print').click(function(){ //foreach
            reportType = document.getElementById('drpReport').value;
            if(reportType != 'No'){
              if(reportType == 'BIR'){
                reportName = 'BIR Report';
              }
              var from = document.getElementById('from').value;
              var to = document.getElementById('to').value;
              document.getElementById("printLink").href = '/Report/print/'+from+'/'+to+'/'+reportName;
              document.getElementById('printLink').click();
            }
        });
    });
  </script>
@endsection