var instance = M.Sidenav.getInstance(elem);

$(document).ready(function(){
    $('#contraer').click(function(){
    	// alert("hola");
    	instance.close();
    	 $('.sidenav').sidenav('close');
    });

});