function actionDelete(event) {
    event.preventDefault();
    //  $(this) laf nut click vao button
    let urlRequest = $(this).data('url');
    let that = $(this);
    swal({
        title: "Bạn có chắc chắn muốn xóa?",
        text: "Bạn sẽ không thể hoàn tác lại nó!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'GET',
                    url: urlRequest,
                    success: function (data) {
                        if (data.code == 200) {
                            that.parent().parent().parent().remove();

                        }
                    },
                    error: function () {

                    }
                })
                swal("Bạn đã xóa thành công!", {
                    icon: "success",
                });
            } else {
                swal("Dữ liệu của bạn chưa được xóa!");
            }
        });
}
$(function () {
    $(document).on('click', '.action_delete', actionDelete);
});

