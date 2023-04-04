function showToast() {
  toastr.warning('Stripe gateway is under construction', 'Coming Soon!', {
      positionClass: 'toast-bottom-right',
      closeButton: true,
      progressBar: true,
      timeOut: '5000',
  });
}