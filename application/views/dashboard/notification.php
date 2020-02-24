<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">DataTables</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Notifications</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Slip No.</th>
                                <th>image</th>
                                <th>Status</th>
                                <th>Req. Date</th>
                                <th>Upload</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Descripttion</th>
                            <th>Message Sent</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Upload</th>
                            <th>Action</th>
                        </tfoot> -->
                        <tbody>
                            <?php $sl = 1;
                            foreach ($notifications as $item) : ?>

                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td> <?php echo $item->query_numbr; ?></td>
                                    <td><?php echo $item->img_upload_url; ?></td>
                                    <td><?php if ($item->status == 1) { ?>
                                            <span class="badge badge-success"><?php echo 'Active'; ?></span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger"><?php echo 'Inactive'; ?></span>
                                        <?php  }
                                        ?></td>
                                    <td>
                                        <?php
                                        if (!empty($item->created_at)) {
                                            echo date('l F j, Y', strtotime($item->created_at));
                                        }
                                        ?> </td>

                                    <td>
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#uploadModal" type="button" href="notification/show/<?php echo $item->id; ?>" data-id="<?php echo $item->id; ?>" id="uploadBtn"> Upload </a>

                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" type="button" href="notification/show/<?php echo $item->id; ?>"> Edit </a>
                                        <a href="#">Delete</a>
                                    </td>
                                </tr>

                            <?php $sl++;
                            endforeach; ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->



</div>
<!---Container Fluid-->

<!-- Upload Nid Model -->

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" enctype="multipart/form-data" id="uploadImgForm">
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="nid">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveImg">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- // Upload NID Model -->

<script>
    $(document).ready(function() {
        $('#uploadBtn').on('click', function() {
            var id = $(uploadBtn).attr('data-id');
            // console.log(id);
            $('#uploadImgForm').on('submit', function() {
                // var img = $('#image_file').val();
                // console.log(img);
                var formData = new FormData();
                alert(formData);
                exit();
                // $.ajax({
                //     url: 'notification/upload',
                //     type: "post",
                //     data: new FormData(this),
                //     processData: false,
                //     contentType: false,
                //     cache: false,
                //     async: false,
                //     success: function() {

                //     }
                // });

            });
        });



    });
</script>