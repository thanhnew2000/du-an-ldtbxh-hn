window.SystemUtil = {
    defaultImgUrl: function (URL, selector, defaultImgUrl) {
        var tester = new Image();
        // tester.onload= function(){
        //     console.log('có ảnh');
        // };
        tester.onerror = function () {
            $(selector).attr('src', defaultImgUrl);
        };
        tester.src = URL;
    },
    previewImage: function (input, selector, defaultImg) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(selector).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        } else {
            $(selector).attr('src', defaultImg);
        }
    }
}
