<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="card-title">
              <a href="<?= site_url('settings/'.$controllers.'') ?>" ><button type="button" class="btn btn-block btn-primary"><i class="fas fa-list"></i> <?= $title_menu; ?></button></a>
            </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">General Form</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="container">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title_header; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= site_url('settings/'.$controllers.'/add') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <input type="Text" name="icb_name" class="form-control <?= form_error('icb_name') == TRUE ? 'is-invalid' : ''; ?>" placeholder="Enter Iconbar Name *">
                  <a style="color: red;"><?= form_error('icb_name') ?></a>
                </div>
                <div class="form-group">
                  <label>Width dan height gambar harus sama</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="icb_image" class="custom-file-input <?= form_error('icb_image') == TRUE ? 'is-invalid' : ''; ?>">
                      <label class="custom-file-label" for="exampleInputFile">Choose Iconbar</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="">Upload</span>
                    </div>
                  </div>
                  <a style="color: red;"><?= form_error('icb_image') ?></a>
                </div>
                <div class="form-group">
                  <button type="Submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                  <button type="Reset" class="btn btn-default"><i class="fas fa-sync-alt"></i> Reset</button>
                </div>
              </div>
              <!-- /.card-body -->
            </form>
          </div>
          <!-- /.card -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->