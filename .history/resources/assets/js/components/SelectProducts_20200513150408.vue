<template>
   <div id="">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">
                    Resellers</a><a href="" class="current">View Resellers</a>> </div>
            <h1>Resellers</h1>

         



        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Resellers</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <!--column names -->
                                    <th>Email</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Date Registered</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($resellers as $reseller)
                                    <tr class="gradeX">
                                        <td>{{$reseller->user()->first()->email}} </td>
                                        <td>{{$reseller->user()->first()->f_name}} </td>
                                        <td>{{$reseller->user()->first()->m_name}} </td>
                                        <td>{{$reseller->user()->first()->l_name}} </td>
                                        <td>{{date('F d Y',strtotime($reseller->created_at))}} </td>
                                        <td> <button class="btn btn-primary">View</button></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
