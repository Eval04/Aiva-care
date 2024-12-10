$(document).ready(function () {
  $(".tab button").click(function () {
    // Hapus kelas 'active' dari semua tombol dan konten
    $(".tab button").removeClass("active");
    $(".content").removeClass("active");

    // Tambahkan kelas 'active' ke tombol dan konten yang dipilih
    const tab = $(this).data("tab");
    $(this).addClass("active");
    $("#" + tab).addClass("active");
  });
});
