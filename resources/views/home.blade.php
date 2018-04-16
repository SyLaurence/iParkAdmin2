@extends ('layout.nav')
@section ('title')
    Dashboard
@endsection
@section ('pagetitle')
    Dashboard
@endsection
@section ('pageContent')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Welcome Message</div>

                <div class="panel-body">
                    Welcome {{session()->get('username')}}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection