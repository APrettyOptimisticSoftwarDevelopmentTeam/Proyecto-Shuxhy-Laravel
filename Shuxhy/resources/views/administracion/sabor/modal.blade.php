<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$sabor->IdSabor}}">
	{{Form::Open(array('action'=>array('SaborController@destroy',$sabor->IdSabor),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Sabor</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el Sabor</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>