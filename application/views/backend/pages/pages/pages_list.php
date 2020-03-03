<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="card-title">
              <a href="<?= site_url('pages/'.$controllers.'/add') ?>" ><button type="button" class="btn btn-block btn-primary"><i class="fas fa-plus-square"></i> <?= $title_menu; ?></button></a>
            </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $title_header; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header"><h3 class="card-title"><?= $title_header; ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="example" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Page Name</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach($pages as $data) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['pgs_name'] ?></td>
                <td>
                  <div class="btn-group btn-group-sm">
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?= $data['pgs_slug'] ?>"><i class="fas fa-eye"></i></a>
                    <a href="<?= site_url('/pages/'.$controllers.'/edit/'.$data['pgs_slug']) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>

                    <!-- only admin -->
                    <?php if($this->fungsi->user_login()->usr_lvl_id == '1') : ?>
                    <a href="<?= site_url('/pages/'.$controllers.'/delete/'.encrypt_url($data['pgs_id'])) ?>" onclick="return confirm('Are you sure you want to Remove?');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    <?php endif ?>
                  </div>
                </td>
              </tr>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal<?= $data['pgs_slug']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View Detail</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <ul class="list-group list-group-unbordered mb-3">
                        <div class="card-body box-profile">
                        <?php if ($data['pgs_image'] == 'noimagepages.png' ) : ?>
                          <div class="text-center">
                            <img class="img-fluid img-responsive"
                                 src="<?=base_url('assets/img/'.$controllers.'/noimagepages/noimagepages.png')?>"
                                 alt="User profile picture">
                          </div>
                        <?php else : ?>
                          <div class="text-center">
                            <img class="img-fluid img-responsive"
                                 src="<?= base_url('assets/img/'.$controllers.'/'.$data['pgs_image'].'')?>"
                                 alt="User profile picture">
                          </div>
                        <?php endif; ?>
                        </div>
                        <li class="list-group-item">
                          Page Name : <?= $data['pgs_name']; ?>
                        </li>
                        <li class="list-group-item">
                          Text Content : <?= $data['pgs_text_content']; ?>
                        </li>
                        <?php if(!empty($data['pgs_maps_link'])) : ?>
                        <li class="list-group-item">
                          aa
                        </li>
                        <?php endif ?>
                        <li class="list-group-item">
                          Tags : 
                          <?php $explodetags = explode(',', $data['pgs_tags']) ?>
                          <?php foreach($explodetags as $tags) : ?>
                            <?= '<div class="btn-group btn-group-sm"><a class="btn btn-secondary" style="color:white">'.$tags.'</a></div>'; ?>
                          <?php endforeach ?>
                        </li>

                        <!-- only admin -->
                        <?php if($this->fungsi->user_login()->usr_lvl_id == '1') : ?>
                        <li class="list-group-item">
                          Created At    : <?= $data['pgs_created_at']; ?>
                        </li>
                        <li class="list-group-item border-danger">
                          <?php foreach ($users as $user) : ?>
                          <?php if ($user['usr_id'] === $data['pgs_created_by']) : ?>
                            Created At  : <?= $user['usr_fullname']; ?>
                          <?php endif; ?>
                          <?php endforeach; ?>
                        </li>
                        <li class="list-group-item border-danger">
                          Edited At     : <?= $data['pgs_edited_at']; ?>
                        </li>
                        <li class="list-group-item border-danger">
                          <?php foreach ($users as $user) : ?>
                          <?php if ($user['usr_id'] === $data['pgs_edited_by']) : ?>
                            Edited By   : <?= $user['usr_fullname']; ?>
                          <?php endif; ?>
                          <?php endforeach; ?>
                        </li>
                      <?php endif ?>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper