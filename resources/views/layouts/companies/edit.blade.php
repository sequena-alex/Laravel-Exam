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
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <section class="col-lg-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="ion ion-briefcase mr-1"></i>
                            Edit Company
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/companies/edit/save') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" class="form-control" name="id" id="id"  value="{{ $company->id }}" hidden>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        @if($company->company_logo)
                                            <img src="{{ url($company->company_logo) }}" alt="" width="100%">
                                        @endif
                                        <br>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="{{ $company->company_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="company_website">Company Website</label>
                                    <input type="text" class="form-control" name="company_website" id="company_website" placeholder="Enter Company Website" value="{{ $company->company_website }}">
                                </div>
                                <div class="form-group">
                                    <label for="username_show_field">Username</label>
                                    <input type="text" class="form-control" name="username_show_field" id="username_show_field" placeholder="username" value="{{ $company->username }}" disabled>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" value="{{ $company->username }}" hidden>

                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ $company->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="">
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Company Logo</label>
                                            <p>{{ $company->company_logo ? $company->company_logo : 'No Logo' }}</p>

                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="uploadLogo" id="uploadLogo">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button> <a href="{{ url('companies') }}" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                        <div class="card-footer clearfix">
                        </div>
                </div>
            </section>
        </div>
    <section>

</div>
@include('layouts.footer')

