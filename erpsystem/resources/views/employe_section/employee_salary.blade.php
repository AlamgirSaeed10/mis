

@extends('template.staff_tmp')
@section('title', 'Employee Salary')
@section('content')
<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Employee Detail</h4>

            <div class="page-title-right">
              <div class="page-title-right">
                <!-- button will appear here -->

                <a href="{{ URL('/employeeprofile') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-xl-9">
          @if (session('error'))

          <div class="alert alert-{{ Session::get('class') }} p-3 ">

            {{ Session::get('error') }}
          </div>

          @endif

          @if (count($errors) > 0)

          <div>
            <div class="alert alert-danger pt-3 pl-0   border-3 bg-danger text-white">
              <p class="font-weight-bold"> There were some problems with your input.</p>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif


          @include('template.employeenav')


        <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title mb-4">Salary</h4>
                      <div class="table-responsive">
                        @if (count($employeesalary) > 0)
                        <div>
                            <table class="table align-middle table-nowrap table-hover mb-0">
                                <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                    <th scope="col">Title</th>                                      
                                   <th scope="col">Amount</th>
                                   <th scope="col">Category
                                     
                                   </th>
                                        <th scope="col">Date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;  $totalsalary=0; ?>
                                    <?php foreach ($employeesalary as $key => $value): 
                                      
                                      if($value->AllowanceCategory == 'Dr')
                                       {
                                           $totalsalary=$totalsalary+$value->Basic;
                                       }
                                       else
                                       {
                                           $totalsalary=$totalsalary-$value->Basic;
                                       }
                                      
                                       $salary = number_format($totalsalary);
                                      
                                      
                                      ?>


                                  <tr>
                                    <td>{{$i}}</td>
                                  <td>{{ $value->Allowncetitle}}</td>
                                  <td id="amount">{{ $value->Basic }}</td>
                                  <td id="amount">{{ $value->AllowanceCategory }}</td>

                                  <?php

$install_date=$value->eDate;
$install_date=date("d/m/Y",strtotime($install_date));

?>
                                  <td>{{ $install_date }}</td>
                                  </tr>
                                   
                                  <?php $i++; ?>
                                    <?php endforeach ?>
                                    <tr>
                                    <td></td>
                                                <td><b>Total</b></td>
                                                <td><b id="">{{  $salary }} </b></td>
                                                <td></td>
                                             
                                                 </tr>

                                </tbody>
                            </table>
                        </div>
                    @endif


                    @if (count($employeesalary) == 0)
                        <p class="text-danger">No Salary Added</p>
                    @endif
                      </div>
                  </div>
                  <!-- end card body -->
              </div>
          </div> <!-- end col -->
      </div>
        </div>
        @include('employe_section.layout.employee_sidebar')
      </div>
   
    </div>
  </div>
  <script type="text/javascript">
    function delete_confirm2(url, IssueLetterID ) {
        console.log(IssueLetterID );
        url = '{{URL::TO('/')}}' + /delete_issue_letter/ + IssueLetterID ;
        jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', url);
    }


    
</script>
  @endsection