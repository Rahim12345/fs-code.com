<div id="sharePostModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return false">
                <div class="modal-header">
                    <h4 class="modal-title">Share post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Account</label>
                        <select name="accountList" id="accountList" class="form-control">

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Exist posts</label>
                        <select name="postsList" id="postsList" class="form-control">
                            <?php require_once __DIR__.'/../views/postsList.php'; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Post</label>
                        <textarea class="form-control" id="post" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" id="sharePostClose">
                    <input type="button" class="btn btn-success" value="Share" id="sharePost" disabled>
                </div>
            </form>
        </div>
    </div>
</div>