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
    },
    changeNotifyStatus: function(element){
        let bell = $(element).find('.m-nav__link-icon');
        let keyArr = [];
        let db = firebase.firestore();

        // change status của tất cả các id có trạng thái unread
        $('[data-notify-id].unread').map(function(index, item){
            keyArr.push($(item).data('notify-id'));
        });

        if(keyArr.length > 0){
           
            keyArr.map(function(notifyKey, index){
                 console.log(notifyKey);
                db.collection("testnoti").doc(notifyKey).update({
                    status: 2
                });
            })
        }
    },

    changStatusField: function(element){
                // let db = firebase.firestore();
        // var jobskill_query = db.collection('testnoti').where('status','==',2);
        // console.log(jobskill_query);
        // jobskill_query.get().then(function(querySnapshot) {
        // querySnapshot.forEach(function(doc) {
        //     doc.ref.delete();
        // });
        // });
        let id = $(element).attr('data-notify-id');
        let url = $(element).attr('url');
        let db = firebase.firestore();
        console.log(id);
        db.collection("testnoti").doc(id).update({
            status: 3
        });
        window.location.href = url

    },

    getFirebaseNotify: function(userId) {

        let db = firebase.firestore();

        db.collection("testnoti")
            .where("recceive_user_id", "==", userId)
            // .where('status', '==', 1)
            .orderBy("sending_time", "desc")
            .limit(30)
            .onSnapshot(function(querySnapshot) {
                let bellring = false;
                let requestData = [];
                querySnapshot.forEach(function(doc) {

                    let item = doc.data();
                    item.notify_id = doc.id;
                    item.sending_time = moment(item.sending_time.toDate()).format('YYYY-MM-DD H:mm:s')
                    requestData.push(item);

                    if(item.status == 1) {
                        bellring = true;
                    }
                });
                if(bellring == true){
                    $('.notify-check-title').text('Có thông báo mới');
                    $('.notify-bell').addClass('ring');
                }else{
                    setTimeout(function(){
                        $('.notify-check-title').text('Bạn đã đọc hết thông báo');
                    }, 3000)

                    $('.notify-bell').removeClass('ring');
                }
                // gửi request api
                axios.post($('#api-get-notify-list').val(), {
                    data: requestData
                })
                .then(function (response) {
                    if(response.statusText == "OK"){
                        $('.m-list-timeline__items').empty();
                        $('.m-list-timeline__items').html(response.data);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            });

    }
}
