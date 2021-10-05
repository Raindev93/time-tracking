import $ from 'jquery';

export default class Creator{
	constructor(){
		this.initListeners();
		this.modal_id = 'create-modal';
	}

	initListeners(){
		let self = this;		
		$(document).on('click', '#submit-task',() => {
			self.submitTask();
		});

	}

	getModal(){
		return M.Modal.getInstance(document.querySelector('#'+this.modal_id));
	}

	closeModal(){
		let modal = this.getModal();
		modal.close();
	}

	updateTable(){
		$.get({
			url: '/tasks/get-table',
			success(html){
				$('#tasks-table').html(html);
			}
		})
	}

	submitTask(){
		let self = this;
		let title = $('input[name="title"]').val();
		let comment = $('input[name="comment"]').val();
		let date = $('input[name="date"]').val();
		let time_spent = $('input[name="time_spent"]').val();

		//TODO display error messages on page
		if(title.length < 2 || comment.length<2){
			return false;
		}
		if(isNaN(Date.parse(date))){
			return false;
		}
		if(isNaN(time_spent)){
			return false;
		}
		$.post({
			url: '/tasks/post',
			data:{
				title: title,
				comment: comment,
				date: date,
				time_spent: time_spent,
				_token: $('meta[name="csrf-token"]').attr('content')
			},
			success: (data) => {
				if(data.status == 1){
					self.closeModal();
					M.toast({html: 'Task created successfully'});
					self.updateTable();
				}
			}
		})
	}
}