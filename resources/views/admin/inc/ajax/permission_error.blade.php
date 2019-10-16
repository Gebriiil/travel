@if (session('error_permission'))

    <script>
        Swal.fire({
				  title: 'Permission error',
				  text: "You Canot enter here",
				  type: 'error',
				  showCancelButton: false,
				  confirmButtonColor: '#3085d6',
				  confirmButtonText: 'cancel'
				})
    </script>

@endif