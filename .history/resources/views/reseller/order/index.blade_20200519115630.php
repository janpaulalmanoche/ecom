@extends ('layouts.resellerLayout.reseller_design')
@section('content')

<reseller-order date_now="{{Carbon\Carbon::now()}}"> </reseller-order>
{{dd(Carbon\Carbon::now())}}
@endsection