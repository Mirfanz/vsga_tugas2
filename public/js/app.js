const formatPrice = new Intl.NumberFormat("id-ID", {
  style: "currency",
  currency: "IDR",
  maximumFractionDigits: 0,
});
const Toast = Swal.mixin({
  toast: true,
  position: "top-right",
  icon: "info",
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener("click", Swal.close);
    toast.addEventListener("mouseenter", Swal.stopTimer);
    toast.addEventListener("mouseleave", Swal.resumeTimer);
  },
});
// ===========================================================================================================

if (navigator.connection)
  navigator.connection.onchange = () => {
    if (!navigator.onLine) Toast.fire({ title: "Koneksi Terpustus" });
  };

// ===========================================================================================================
