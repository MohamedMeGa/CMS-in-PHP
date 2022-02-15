$(document).ready(function(){
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
});

$(document).ready(function(){
    
    $('#selectAllPost').click(function(event){
    if(this.checked){
        $('.checkBoxs').each(function(){
            this.checked = true;
        });
    }else{
        $('.checkBox').each(function(){
            this.checked = true;
        });
    }
    });



    var div_box = "<div id='load-screen'><div id='loading'></div></div>";
    $("body").prepend(div_box);
    $('load-screen').delay(700).fadeOut(600, function(){
        $this.remove();
    });
});