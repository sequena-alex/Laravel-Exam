@include('layouts.header')
@include('layouts.partials.navbars')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Newsletters</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Newsletter</li>
            </ol>
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
                  <i class="ion ion-clipboard mr-1"></i>
                  Newsletter
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="newsLetterTable" class="table table-bordered table-hover newsLetterTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Image</th>
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
        $.ajax({
            url : 'https://newsapi.org/v2/top-headlines?country=us&apiKey=9e56665dd12747d699700625112fe619',
            type : 'GET',
            dataType : 'json',
            success : function(data) {
                bindtoDatatable(data.articles);
            }
        });
        function bindtoDatatable(data) {
            var table = $('#newsLetterTable').dataTable({
                "bAutoWidth" : false,
                "aaData" : data,
                "columns" : [
                    {"data" : "title"},
                    {"data" : "author"},
                    {"data" : "content"},
                ],
                columnDefs: [{
                    targets: 3,
                    render: function (data, type, row, meta) {
                        data = `<img src='${row.urlToImage}' width='50%'>`;
                        return data;
                    }
                }],
            })
    }
    });

</script>
