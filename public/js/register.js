document.getElementById("cmttruoc").addEventListener('change', e => {
	document.getElementById("anhcmttruoc").src = URL.createObjectURL(e.target.files[0]);
});
document.getElementById("cmtsau").addEventListener('change', e => {
	document.getElementById("anhcmtsau").src = URL.createObjectURL(e.target.files[0]);
});
document.getElementById("daidien").addEventListener('change', e => {
	document.getElementById("anhdaidien").src = URL.createObjectURL(e.target.files[0]);
});
$(function () {
    $("#checkbtn_dk").change(function () {
        if($(this).is(":checked")){
            $("#btn_dk").attr("disabled",false);
        } else {
            $("#btn_dk").attr("disabled", true);
        }
    });
    init_form_reg();
});
