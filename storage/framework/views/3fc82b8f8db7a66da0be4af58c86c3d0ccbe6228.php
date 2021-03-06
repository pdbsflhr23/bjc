<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <!-- START CONTAINER -->
    <div class="row" style="align-content: center !important;">
        <!-- START CONTENT ROW -->
        <div class="col-md-12 col-xs-10" >

			<div class="widget widget-default">
                <header class="widget-header">
					<h2 class="page-header-heading">
						<span class="typcn typcn-document-add page-header-heading-icon"></span>
						New Complaint
					</h2>
                </header>
                <div class="widget-body">
                    <div class="widget-body">
                        <form method="POST" action="<?php echo e(url('complaint/add')); ?>">
                            <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="">SBT Code</label>
                                    <input name="sbtcode" id="sbtcode" class="form-control input-sm" placeholder="SBT Code" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="">Contact Person</label><br>
                                    <input name="person" id="person" class="form-control input-sm" placeholder="Contact Person" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="">Contact Number</label><br>
                                    <input name="number" id="number" class="form-control input-sm" placeholder="Contact Number" type="number">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="">Job Nature Details</label><br>
                                    <input name="job_nature_details" id="job_nature_details" class="form-control input-sm" placeholder="Contact Number" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="password">Complaint</label><br>
                                    <textarea name="complaint" id="complaint" class="form-control" placeholder="Complaint"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Contact Email</label><br>
                                    <input name="email" id="email" class="form-control input-sm" placeholder="Contact Email" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Location</label><br>
                                    <input name="location" id="location" class="form-control input-sm" placeholder="Location" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="password">Address</label><br>
                                    <input name="address" id="address" class="form-control input-sm" placeholder="Address" type="text">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="password">Complaint Type</label><br>
                                    <select name="com_type" id="com_type" class="form-control input-sm">
                                        <option value="" >Select Job Type</option>
                                        <option value="Normal">Normal</option>
                                        <option value="High">High</option>
                                        <option value="Urgent">Urgent</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="password">Job Nature</label><br>
                                    <select name="job_nature" id="job_nature" class="form-control input-sm">
                                        <option value="" >Select Job Type</option>
                                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($job->id); ?>" ><?php echo e($job->job); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="username">Status</label><br>
                                    <select name="status" id="status" class="form-control input-sm">
                                        <option value="" >Select Job Status</option>
                                        <option value="Forwarded">Forward</option>
                                        <option value="InProcess">In Process</option>
                                        <option value="Solved">Solved</option>
                                    </select>
                                </div>
                                <div class="form-group" id="on_forward">
                                    <label for="username">Forward to</label><br>
                                    <select name="forwarded_to" id="forwarded_to" class="form-control input-sm">
                                        <option value="" >Select Forward to</option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->department); ?>" ><?php echo e($department->department); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group" id="on_solved">
                                    <label for="password">Solved By</label><br>
                                    <input name="solved" id="solved" class="form-control input-sm" placeholder="Solved by" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">Add Complaint</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
        <!-- END CONTENT ROW -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('#on_forward').hide();
            $('#on_solved').hide();
            $('#status').change(function(){
                if($(this).val() == 'Forwarded'){
                    $('#on_solved').hide();
                    $('#on_solved').val('');
                    $('#on_forward').show();
                }
                if($(this).val() == 'InProcess'){
                    $('#on_forward').hide();
                    $('#on_forward').val('');
                    $('#on_solved').hide();
                    $('#on_solved').val('');
                }
                if($(this).val() == 'Solved'){
                    $('#on_forward').hide();
                    $('#on_forward').val('');
                    $('#on_solved').show();
                }
            });

        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>