$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;
            });
        } else{
            checkbox.each(function(){
                this.checked = false;
            });
        }
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });


    function render()
    {
        $.ajax({
            type:'POST',
            url:'/fs-code.com/wp-content/plugins/fs-vk-plugin/controllers/render.php',
            success:function (response) {
                $('tbody').html('').html(response);
            }
        });
    }

    $('#getAccess').click(function (){
        var client_id = $('#app_id').val();
        $.ajax({
            type:'POST',
            data:{client_id:client_id},
            url:"/fs-code.com/wp-content/plugins/fs-vk-plugin/controllers/getAccess.php",
            success:function (response) {
                getAccess(response)
            }
        });
    });

    function getAccess(url) {
        window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,width=500,height=500");
    }

    $('#accountModalOpen').click(function () {
        $('#link').val('');
    });

    $('#addAccount').click(function () {
        var apiID   = $('#app_id').val();
        var url     = $('#link').val();

        $.ajax({
            type: "POST",
            data: {apiID:apiID,url:url},
            url:'/fs-code.com/wp-content/plugins/fs-vk-plugin/controllers/fetchUrl.php',
            success:function (response) {
                if(response === 'found')
                {
                    toastr.error('already exist','Account');
                }
                else
                {
                    toastr.success('saved successfully','Account');
                }
                render();
                $('#addAccountClose').click();
            }
        });
    });
    
    $('.fa-share').click(function () {
        $('#post').val('');
        $('#sharePost').prop('disabled',true);

        $.ajax({
            type: "POST",
            url:'/fs-code.com/wp-content/plugins/fs-vk-plugin/controllers/getAccounts.php',
            success:function (response) {
                $('#accountList').html('').html(response);
            }
        });
    });

    $('#sharePost').click(function () {
        var user_id = $('#accountList').val();
        var post    = $('#post').val();
        var url     = $('#postsList').val();
        $.ajax({
            type:'POST',
            data:{user_id,post,url},
            url:'/fs-code.com/wp-content/plugins/fs-vk-plugin/controllers/sharePost.php',
            success:function (response) {
                $('#sharePostClose').click();
                toastr.success('share successfully','Post');
            }
        });
    });

});

$(document).on('input','#link',function () {

    var url     = $(this).val();
    if (url !== '')
    {
        $('#addAccount').prop('disabled',false);
    }
    else
    {
        $('#addAccount').prop('disabled',true);
    }
});

$(document).on('input','#post',function () {

    var post     = $(this).val();
    if (post !== '')
    {
        $('#sharePost').prop('disabled',false);
    }
    else
    {
        $('#sharePost').prop('disabled',true);
    }
});


$(document).on('click','.fa-share',function () {
    $('#post').val('');
    $('#sharePost').prop('disabled',true);

    $.ajax({
        type: "POST",
        url:'/fs-code.com/wp-content/plugins/fs-vk-plugin/controllers/getAccounts.php',
        success:function (response) {
            $('#accountList').html('').html(response);
        }
    });
});