document.getElementById("cmttruoc").addEventListener('change', e => {
	document.getElementById("anhcmttruoc").src = URL.createObjectURL(e.target.files[0]);
});
document.getElementById("cmtsau").addEventListener('change', e => {
	document.getElementById("anhcmtsau").src = URL.createObjectURL(e.target.files[0]);
});
document.getElementById("daidien").addEventListener('change', e => {
	document.getElementById("anhdaidien").src = URL.createObjectURL(e.target.files[0]);
});
