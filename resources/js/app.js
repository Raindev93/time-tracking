import Creator from './creator';
import Report from './report';

class Init {

	constructor(){
		this.initListeners();
		this.initClasses();
	}

	initListeners(){
		document.addEventListener('DOMContentLoaded', () => {
			var elems = document.querySelectorAll('.modal');
			var instances = M.Modal.init(elems, {});

			elems = document.querySelectorAll('.datepicker');
    		instances = M.Datepicker.init(elems, {});
		});		
	}

	initClasses(){
		new Creator();
		new Report();
	}
}

new Init();