@include('layouts.header')
@include('layouts.partials.navbars')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Companies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Companies</li>
            </ol>

            @if(Session::get('success'))
                <div class="alert alert-success" role="alert">
                <h5 class="alert-heading"><i class="fa fa-check" style="margin-right: 7px"></i>Great!</h5>
                {{ Session::get('success') }}
                </div>
            @endif
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-7">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-briefcase mr-1"></i>
                  Companies
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="companiesTable" class="table table-bordered table-hover companiesTable">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
          <section>
        </div>
      </div>
    </section>
</div>

@include('layouts.footer')
<script>
    $(document).ready(function(){
        $("#companiesTable").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('ajax.datatables') }}",
            columnDefs: [

                {
                    "targets": [0],
                    "data" : "company_name",
                    "defaultContent": "-",
                },
                {
                    "targets": [1],
                    "data" : "email",
                    "defaultContent": "-",
                },
                {
                    "targets": [2],
                    "data" : "company_website",
                    "defaultContent": "-",
                },
                {
                    targets: 3,
                    render: function (data, type, row, meta) {
                    data = `<a href='{{ url('companies/edit/show/${row.id}') }}' class="btn btn-primary">Edit</a> &nbsp;`;
                    data += `<a href='{{ url('companies/delete/${row.id}') }}' class="btn btn-danger">Delete</a>`;
                       return data;
                    }
                }
            ]
        });
    });
</script>
