@extends ('layouts.resellerLayout.reseller_design')
@section('content')

<reseller-order date-now={{date('F d Y',strtotime(Carbon\Carbon::now()))}}> </reseller-order>
@endsection