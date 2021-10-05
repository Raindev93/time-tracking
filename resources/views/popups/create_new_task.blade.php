<div id="create-modal" class="modal">
	<div class="modal-content">
		<h4>Create new task</h4>
		<div class="row">
			<div class="input-field col s12">
				<input  id="task-title" type="text" name="title" >
				<label for="task-title">{{ __('forms.title') }}</label>
				<span class="text-danger title-error"></span>
			</div>

			<div class="input-field col s12">
				<input  id="task-comment" type="text" name="comment" >
				<label for="task-comment">{{ __('forms.comment') }}</label>
				<span class="text-danger comment-error"></span>
			</div>

			<div class="input-field col s6">
				<input  id="task-date" type="text" class="datepicker" name="date" >
				<label for="task-date">{{ __('forms.date') }}</label>
				<span class="text-danger date-error"></span>
			</div>
			<div class="input-field col s6">
				<input  id="task-time_spent" type="number"  name="time_spent" >
				<label for="task-time_spent">{{ __('forms.time_spent') }}</label>
				<span class="text-danger time_spent-error"></span>
			</div>
			<div class="center">
				<a class="waves-effect waves-light btn" id="submit-task"><i class="material-icons left">cloud</i>Create</a>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
	</div>
</div>