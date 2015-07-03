function fadeOut(property, time){
    $(document).ready(function (){
        setTimeout(function(){
            $(property).slideUp();
        }, time);
    });
}