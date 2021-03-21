<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return false">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-vk"></i> Add an account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times bg-danger"></i></button>
                </div>
                <div class="modal-body">
                    <ol class="list-group vertical-steps">
                        <li class="list-group-item completed">
                            <?php require_once __DIR__.'/../../includes/views/apis.php'; ?>
                        </li>
                        <li class="list-group-item active completed">
                            <span><button class="btn btn-primary p-4" id="getAccess" type="button">GET ACCESS</button></span
                        </li>
                        <li class="list-group-item active completed">
                            <span>When the authorization has completed, copy the URL</span
                        </li>
                        <li class="list-group-item active completed">
                            <div class="form-group">
                                <label for="link">URL</label>
                                <textarea class="form-control" id="link" rows="3"></textarea>
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" id="addAccountClose" value="Cancel">
                    <input type="submit" class="btn btn-success" id="addAccount" value="Add" disabled>
                </div>
            </form>
        </div>
    </div>
</div>