@if(session('status'))
	@if(session('status') == 'eliminado')
		<script type="text/javascript">
swal.fire({
	title: 'Elemento Eliminado',
  width: 600,
  padding: '3em',
  background: '#fff url(https://sweetalert2.github.io/images/trees.png)',
  backdrop: `
    rgba(0,0,123,0.4)
    url("https://sweetalert2.github.io/images/nyan-cat.gif")
    left top
    no-repeat
  `
})
	/*		swal({
				position: 'top-end',
				type: 'success',
				title: 'Elemento Eliminado',
				showConfirmButton: false,
				timer: 1500
			})*/
		</script>
	@endif

	@if(session('status') == 'guardado')
		<script type="text/javascript">
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Elemento Guardado',
				showConfirmButton: false,
				timer: 1500
			})
		</script>
	@endif

	@if(session('status') == 'actualizado')
		<script type="text/javascript">
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Elemento Actualizado',
				showConfirmButton: false,
				timer: 1500
			})
		</script>
	@endif
@endif