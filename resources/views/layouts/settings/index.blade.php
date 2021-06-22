@include('layouts.header')
@include('layouts.partials.navbars')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
                            Settings
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/settings/edit/save') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="email_receiver">Email Recipient</label>
                                    <input type="email" class="form-control" name="email_receiver" id="email_receiver" placeholder="Enter Email Recipient" value="{{ $setting->email_recipient }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <div class="card-footer clearfix">
                        </div>
                </div>
            </section>
        </div>
    <section>

@include('layouts.footer')
