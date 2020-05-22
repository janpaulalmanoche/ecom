@extends ('layouts.resellerLayout.reseller_design')
@section('content')

<reseller-order date="{{  date(' d Y',strtotime(Carbon\Carbon::now()))}}"> </reseller-order>
@endsection
