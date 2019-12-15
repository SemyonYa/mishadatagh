// $(document).ready(function() {
//     alert('qwe');
// });

/* IMAGE MANAGER */
function LoadImageManager(attr) {
    $('#VikarModal').load('/image/list-modal');
    $('#VikarModal').attr('data-input-id', attr);
}

function ChooseImage(name) {
    $('#' + $('#VikarModal').attr('data-input-id')).val(name);
    $('#VikarImgPreview').attr('src', '/web/images/' + name);
    $('#VikarModal').modal('hide');
}
/* ** */