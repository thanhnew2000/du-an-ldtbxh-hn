window.SystemUtil = {
    defaultImgUrl: function(URL, selector, defaultImgUrl){
        var tester=new Image();
        // tester.onload= function(){
        //     console.log('có ảnh');
        // };
        tester.onerror= function(){
            $(selector).attr('src', defaultImgUrl);
        };
        tester.src=URL;
    },
}