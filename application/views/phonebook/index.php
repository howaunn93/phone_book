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
						<li class="breadcrumb-item active" aria-current="page">Home</li>
					</ol>
				</nav>
				
				<div class="d-flex justify-content-between mt-4 mb-3">
					<div class="col-md-3">
						<form action="" method="GET" name="search">
							<input class="form-control form-control-sm" placeholder="Search" name="q" value="<?php echo isset($_GET['q']) ? $_GET['q']:''?>" autocomplete="off" />
						</form>
					</div>
					<div class="col-md-2 d-flex justify-content-end">
						<a class="btn btn-primary btn-sm" href="<?php echo base_url('phone/add'); ?>">
							<i class="fas fa-plus fa-xs mr-1"></i>Add
						</a>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Phone&nbsp;No.</th>
								<th scope="col">Status</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $count=0; ?>
							<?php foreach($list_data as $data): ?>
								<tr>
									<td width="80px" class="align-middle"><?php echo ++$start ?></td>
									<td><?php echo $data->name ?></td>
									<td><?php echo $data->phone ?></td>
									<td>
										<?php
											if($data->status==0){
												echo '<span class="badge badge-danger">Offline</span>';
											}else{
												echo '<span class="badge badge-success">Online</span>';
											}
										?>
									</td>
									<td>
										<div class="text-sans-serif" style="white-space: nowrap;">
											<a href="<?php echo base_url().'phone/edit/'.$data->id ?>" class="btn btn-outline-primary btn-sm">
												<i class="fas fa-pencil-alt mr-1"></i>Edit
											</a>
											<a href="<?php echo base_url().'phone/view/'.$data->id ?>" class="btn btn-outline-success btn-sm">
												<i class="fas fa-eye mr-1"></i>View
											</a>
											<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo $data->id ?>">
												<i class="fas fa-trash mr-1"></i>Delete
											</button>
										</div>
									</td>
								</tr>
								<div class="modal fade" id="deleteModal<?php echo $data->id ?>" tabindex="-1" role="dialog">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Delete contact</h5>
											</div>
											<div class="modal-body">
												Confirm delete contact?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
												<a href="<?php echo base_url().'phone/delete/'.$data->id ?>" class="btn btn-danger btn-sm">Delete</a>
											</div>
										</div>
									</div>
								</div>
								<?php $count++; ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="row pt-3">
					<div class="col">Total Record : <?php echo $total_rows ?></div>
					<div class="col col-auto">
						<span class="float-end">
							<?php echo $pagination ?>
						</span>
					</div>
				</div>
			</div>
			<?php $this->load->view('includes/footer'); ?>
		</div>
	</body>
</html>
<script>

	if('<?php echo $this->session->flashdata('add_success')?>')
		toastr.success('<?php echo $this->session->flashdata('add_success')?>');

	if('<?php echo $this->session->flashdata('add_error')?>')
		toastr.error('<?php echo $this->session->flashdata('add_error')?>');

	if('<?php echo $this->session->flashdata('edit_success')?>')
		toastr.success('<?php echo $this->session->flashdata('edit_success')?>');

	if('<?php echo $this->session->flashdata('edit_error')?>')
		toastr.error('<?php echo $this->session->flashdata('edit_error')?>');

	if('<?php echo $this->session->flashdata('delete_success')?>')
		toastr.success('<?php echo $this->session->flashdata('delete_success')?>');

	if('<?php echo $this->session->flashdata('delete_error')?>')
		toastr.error('<?php echo $this->session->flashdata('delete_error')?>');

</script>