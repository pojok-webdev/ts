$('.clients').each(function(){
    client = $(this).attr('value');
    console.log('client',client)
    /*$.ajax({
        url:'/installs/checkexists/'+client,
        dataType:'json'
    })
    .done(res=>{
        console.log('Res',res)
    })
    .fail(err=>{
        console.log('Err',err)
    });*/
})