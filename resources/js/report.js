export default class Report{
	constructor(){
		this.initListener();
	}

	initListener(){
		var self = this;
		$(document).on('change', '.report-date-change', ()=>{
			self.updateReportHref();
		});
		$(document).on('click', '#get-report', () => {
			self.updateReportHref();
		});
	}

	updateReportHref(){
		var from = $('#date-from').val();
		var to = $('#date-to').val();

		$('#get-report').attr('href', '/tasks/get-report?from='+from+'&to='+to);
	}

}