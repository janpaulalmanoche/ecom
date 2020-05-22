@extends ('layouts.resellerLayout.reseller_design')
@section('content')

<reseller-order date-now="{{Carbon\Carbon::now()}}"> </reseller-order>
@endsection