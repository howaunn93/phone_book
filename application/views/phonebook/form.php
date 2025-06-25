<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view("includes/header"); ?>
	</head>
	<body>
		<div>
			<?php $this->load->view('includes/sidebar');?>
			<div class="main-content">

				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $type ?> Contact</li>
					</ol>
				</nav>
				
        <form action="<?= base_url().$action ?>" method="POST">
          <div class="col-12">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name ?>" <?php echo $type=="View"?"disabled":"" ?> required>
                <input type="text" name="id" value="<?php echo $id ?>" hidden>
              </div>
              <div class="col-md-6 mb-3">
                <label>Status</label>
                <select class="form-control" name="status" <?php echo $type=="View"?"disabled":"" ?> required>
                  <option value="1" <?php echo $status==1?"selected":"" ?>>Online</option>
                  <option value="0" <?php echo $status==0?"selected":"" ?>>Offline</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Phone&nbsp;No.</label>
                <input type="text" class="form-control" placeholder="Phone No." name="phone" id="phone" value="<?php echo $phone ?>" <?php echo $type=="View"?"disabled":"" ?> required>
              </div>
            </div>
            <div class="d-flex justify-content-end gap-2">
              <button type="button" class="btn btn-secondary btn-sm mr-1" onclick="history.back()"><i class="fa fa-arrow-left mr-1"></i>Back</button>
              <?php if($type!="View"){ ?>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save mr-1"></i>Save</button>
              <?php } ?>
            </div>
          </div>
        </form>

			</div>
			<?php $this->load->view('includes/footer'); ?>
		</div>
	</body>
</html>
<script>
  $('#phone').on('input', function () {
    this.value = this.value.replace(/\D/g, '').substring(0, 15);
  });
</script>