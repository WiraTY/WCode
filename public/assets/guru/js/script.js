const swal = $(".swal").data("swal");
if (swal) {
  Swal.fire({
    title: "Data Berhasil",
    text: swal,
    icon: "success",
  });
}

$(document).on("click", ".btn-hapus", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data yang telah dihapus tidak dapat dikembalikan!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

function showPomodoroAlert(message, icon) {
    Swal.fire({
      title: message,
      icon: icon,
    });
  }