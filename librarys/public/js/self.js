$(document).ready(function () {
    // $('.label').popup({
    //     inline:true,
    //     position:'bottom left',
    //     hoverable:true,
    //     delay: {
    //         show: 50,
    //         hide: 100
    //     }
    //
    // });
    $('.ui.dropdown')
        .dropdown();

    $('.course').click(function () {
        var cur=$(this).attr('cur_co_id');
        document.location.href='course?'+'co_id='+cur;
    });
    $('.major').click(function () {
        var cur=$(this).attr('cur_major_id');
        document.location.href='major?'+'major_id='+cur;
    });

    $('#search').click(function () {
        var limits=$('#limits').val();

        var key=$('#key').val();
        // alert(limits+key);
        document.location.href='searchAll?'+'limits='+limits+'&'+'key='+key;
    });
    $('.artcle').click(function () {
        var id=$(this).attr('arti_id');
        document.location.href='article?'+'id='+id;
    });
});
