<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="card-title">
              <a href="<?= site_url('blogs/'.$controllers.'-list') ?>" ><button type="button" class="btn btn-block btn-primary"><i class="fas fa-list"></i> <?= $title_menu; ?></button></a>
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
            <form role="form" action="<?= site_url('blogs/'.$controllers.'/add') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <input type="Text" name="blg_title" class="form-control <?= form_error('blg_title') == TRUE ? 'is-invalid' : ''; ?>" placeholder="Enter Blog Title *">
                  <a style="color: red;"><?= form_error('blg_title') ?></a>
                </div>
                <div class="form-group">
                  <select name="blg_cat_id[]" class="select2" multiple="multiple" data-placeholder="You Can Select More Than One Category *" style="width: 100%;">
                    <?php foreach ($categories as $category): ?>
                      <?php if ($category['cat_id'] == $blogs['blg_cat_id']): ?>
                        <option value="<?= $group['grp_id']; ?>" selected="selected"><?= $category['cat_name']; ?></option>
                      <?php else : ?>
                        <option value="<?= $category['cat_id']; ?>"><?= $category['cat_name']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <a style="color: red;"><?= form_error('blg_cat_id[]') ?></a>
                </div>
                <div class="form-group">
                  <select id="colorselector" name="blg_view_id" class="form-control select2 select2-success" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option value=""> -Select-</option>
                    <option value="Most_Popular"> Most Popupar</option>
                    <option value="Trending_Now"> Trending Now</option>
                    <option value="Featured"> Featured</option>
                    <option value="Video_Tips"> Video Tips</option>
                    <option value="Video_Review"> Video Review</option>
                    <option value="Slide"> Slide</option>
                  </select>
                  <a style="color: red;"><?= form_error('blg_view_id') ?></a>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="blg_image" class="custom-file-input <?= form_error('blg_image') == TRUE ? 'is-invalid' : ''; ?>">
                      <label class="custom-file-label" for="exampleInputFile">Choose Blog Image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="">Upload</span>
                    </div>
                  </div>
                  <a style="color: red;"><?= form_error('blg_image') ?></a>
                </div>
                <div class="form-group">
                  <input type="Text" name="blg_video" class="form-control" placeholder="Enter Link Video Youtube">
                </div>
                <div class="form-group">
                  <textarea class="textarea" name="blg_text_content" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                  <input type="Text" name="blg_tags[]" class="form-control <?= form_error('blg_tags[]') == TRUE ? 'is-invalid' : ''; ?>" data-role="tagsinput" placeholder="Tags *">
                  <a style="color: red;"><?= form_error('blg_tags[]') ?></a>
                </div>
                <div class="form-group">
                  <select id="colorselector" name="blg_status" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option value="1"> Publish</option>
                    <option value="2"> Draft</option>
                  </select>
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