@extends ('layouts.resellerLayout.reseller_design')
@section('content')

<reseller-order date-now="{{}}"> </reseller-order>
{{dd(

    date('F d Y',strtotime(Carbon\Carbon::now())
)}}
@endsection