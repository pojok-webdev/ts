$('#btnDownloadSelected').click(function(){
    console.log("tes");
    $(".clients:checked").each(function(){
        console.log('clietns', $(this).val())
        installsiteid = $(this).val();
        $.ajax({
            url:'/installs/createreport/'+installsiteid
        })
        .done(res=>{
            console.log("res",res);
        })
        .fail(err=>{
            console.log("Err",err);
        });
    });
});