<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="card-title">
              <?php if (empty($iconbar)) : ?>
                <a href="<?= site_url('settings/'.$controllers.'/add') ?>" ><button type="button" class="btn btn-block btn-primary"><i class="fas fa-plus-square"></i> <?= $title_menu ?></button></a>
              <?php else : ?>
                <a href="#" ><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#noiconbarimages"><i class="fas fa-plus-square"></i> <?= $title_menu ?></button></a>
              <?php endif; ?>
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
          <div class="card-body">
            <div class="row mt-4">
              <?php foreach ($iconbar as $data) : ?>
              <div class="col-sm-3">
                <div style="height: 180px; background-image : url(<?= base_url('assets/img/settings/iconbar/'.$data['icb_image']); ?>);" class="position-relative p-3 bg_images_slide">
                  <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-secondary text-lg">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?= $data['icb_slug']; ?>"><i class="fas fa-eye"></i></a>
                        <a href="<?= site_url('/settings/iconbar/edit/'.$data['icb_slug']) ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= site_url('/settings/iconbar/delete/'.encrypt_url($data['icb_id'])) ?>" onclick="return confirm('Are you sure you want to Remove?');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="text-dark">
                    <small><h3><?= $data['icb_name']; ?></h3></small>
                  </div>
                </div>
              </div>

              <!-- view details -->
                <div class="modal fade" id="exampleModal<?= $data['icb_slug']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card-body box-profile">
                          <?php if ( $data['icb_image'] == 'bar.png' ) : ?>
                            <div class="text-center">
                              <img class="profile-user-img img-fluid img-responsive"
                                   src="<?=base_url()?>assets/img/settings/iconbar/noiconbar/bar.png"
                                   alt="User profile picture">
                            </div>
                          <?php else : ?>
                            <div class="text-center">
                              <img class="profile-user-img img-fluid img-responsive"
                                   src="<?= base_url()?>assets/img/settings/iconbar/<?= $data['icb_image']; ?>"
                                   alt="User profile picture">
                            </div>
                          <?php endif; ?>
                        </div>
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            Name           : <?= $data['icb_name']; ?>
                          </li>
                          <?php if ($this->fungsi->user_login()->usr_lvl_id == '1') : ?>
                            <li class="list-group-item">
                              Created At    : <?= $data['icb_created_at']; ?>
                            </li>
                            <li class="list-group-item border-danger">
                              <?php foreach ($users as $user) : ?>
                              <?php if ($user['usr_id'] === $data['icb_created_by']) : ?>
                                Created At  : <?= $user['usr_fullname']; ?>
                              <?php endif; ?>
                              <?php endforeach; ?>
                            </li>
                            <li class="list-group-item border-danger">
                              Edited At     : <?= $data['icb_edited_at']; ?>
                            </li>
                            <li class="list-group-item border-danger">
                              <?php foreach ($users as $user) : ?>
                              <?php if ($user['usr_id'] === $data['icb_edited_by']) : ?>
                                Edited At   : <?= $user['usr_fullname']; ?>
                              <?php endif; ?>
                              <?php endforeach; ?>
                            </li>
                          <?php endif; ?>
                        </ul>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

              <?php endforeach; ?>
            </div>
          </div>
          <!-- /.card-body -->

          <!-- alert icon bar -->
          <div class="modal fade" id="noiconbarimages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body box-profile">
                    <?php if ( $data['icb_image'] == 'bar.png' ) : ?>
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-responsive"
                             src="<?=base_url()?>assets/img/settings/iconbar/noiconbar/bar.png"
                             alt="User profile picture">
                      </div>
                    <?php else : ?>
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-responsive"
                             src="<?= base_url()?>assets/img/settings/iconbar/<?= $data['icb_image']; ?>"
                             alt="User profile picture">
                      </div>
                    <?php endif; ?>
                  </div>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <div class="text-danger text-center">
                        <h3>YOU HAS ALREADY ICON BAR</h3>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
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