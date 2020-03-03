<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="card-title">
            <a href="<?= site_url(''.$controllers.'/add') ?>" ><button type="button" class="btn btn-block btn-primary"><i class="fas fa-plus-square"></i> <?= $title_menu ?></button></a>
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
              <?php foreach ($ads as $data) : ?>
              <div class="col-sm-3">
                <div style="height: 180px; background-image : url(<?= base_url('assets/img/ads/'.$data['ads_image']); ?>);" class="position-relative p-3 bg_images_slide">
                  <div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-secondary text-lg">
                      <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?= $data['ads_slug']; ?>"><i class="fas fa-eye"></i></a>
                        <a href="<?= site_url('ads/edit/'.$data['ads_slug']) ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= site_url('ads/delete/'.encrypt_url($data['ads_id'])) ?>" onclick="return confirm('Are you sure you want to Remove?');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="text-dark">
                    <small><h3><?= $data['ads_name']; ?></h3></small>
                  </div>
                </div>
              </div>

              <!-- view details -->
                <div class="modal fade" id="exampleModal<?= $data['ads_slug']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <?php if ( $data['ads_image'] == 'noimageads.png' ) : ?>
                            <div class="text-center">
                              <img class="profile-user-img img-fluid img-responsive"
                                   src="<?=base_url()?>assets/img/ads/noimageads/noimageads.png"
                                   alt="User profile picture">
                            </div>
                          <?php else : ?>
                            <div class="text-center">
                              <img class="profile-user-img img-fluid img-responsive"
                                   src="<?= base_url()?>assets/img/ads/<?= $data['ads_image']; ?>"
                                   alt="User profile picture">
                            </div>
                          <?php endif; ?>
                        </div>
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            Name           : <?= $data['ads_name']; ?>
                          </li>
                          <li class="list-group-item">
                            Position           : <a style="color: red"><?= $data['ads_position']; ?></a>
                          </li>
                          <li class="list-group-item">
                            Link           : <?= $data['ads_link']; ?>
                          </li>
                          <?php if ($this->fungsi->user_login()->usr_lvl_id == '1') : ?>
                            <li class="list-group-item">
                              Created At    : <?= $data['ads_created_at']; ?>
                            </li>
                            <li class="list-group-item border-danger">
                              <?php foreach ($users as $user) : ?>
                              <?php if ($user['usr_id'] === $data['ads_created_by']) : ?>
                                Created At  : <?= $user['usr_fullname']; ?>
                              <?php endif; ?>
                              <?php endforeach; ?>
                            </li>
                            <li class="list-group-item border-danger">
                              Edited At     : <?= $data['ads_edited_at']; ?>
                            </li>
                            <li class="list-group-item border-danger">
                              <?php foreach ($users as $user) : ?>
                              <?php if ($user['usr_id'] === $data['ads_edited_by']) : ?>
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