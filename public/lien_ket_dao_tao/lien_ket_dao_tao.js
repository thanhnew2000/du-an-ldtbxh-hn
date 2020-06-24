$("#co_so_dao_tao").change(function() {
    var op = $("select option:selected").val();
    axios
        .post(routeGetMaNganhNghe, {
            id: $("#co_so_dao_tao").val(),
        })
        .then(function(response) {
            var htmldata = '<option value="-1" >Chọn</option>';
            response.data.forEach((element) => {
                htmldata += `<option value="${element.id}" >${element.ten_nganh_nghe}-${element.id}</option>`;
            });
            if ($("#co_so_dao_tao").val() == "") {
                $("#ma_nganh_nghe").attr("disabled", true);
            } else {
                $("#ma_nganh_nghe").attr("disabled", false);
            }

            $("#ma_nganh_nghe").html(htmldata);
        })
        .catch(function(error) {
            console.log(error);
        });
    if (op <= -1) {
        $("#ma_nganh_nghe-error").html("");
    } else {
        $("#ma_nganh_nghe-error").html("");
        $("#co_so_dao_tao-error").html("");
    }
});
//phuc validate js
$('[name="co_so_id"]').change(function() {
    let op = $(this).val();
    let mes = op > 0 ? "" : "Vui lòng chọn cơ sở";
    $("#co_so_dao_tao-error").html(mes);
});
$('[name="nghe_id"]').change(function() {
    let op = $(this).val();
    let mes = op > 0 ? "" : "Vui lòng chọn ngành nghề";
    $("#ma_nganh_nghe-error").html(mes);
});
$('[name="nam"]').change(function() {
    let op = $(this).val();
    let mes = op > 0 ? "" : "Vui lòng chọn năm";
    $("#nam-error").html(mes);
});
$('[name="dot"]').change(function() {
    let op = $(this).val();
    let mes = op > 0 ? "" : "Vui lòng chọn đợt";
    $("#dot-error").html(mes);
});

let nodeList = document.querySelectorAll(".name-field");
const listField = [];
nodeList.forEach((element) => {
    listField.push(element.getAttribute("name"));
});
const rule = {
    number: true,
    digits: true,
    min: 0,
};

let rules = {
    co_so_id: {
        min: 0,
    },
    nghe_id: {
        min: 0,
    },
    nam: {
        min: 0,
    },
    dot: {
        min: 0,
    },
};
listField.forEach(function(value) {
    rules[value] = rule;
});

const mess = {
    number: "Vui lòng nhập liệu hợp lệ",
    digits: "Số liệu nhỏ nhất là 0",
    min: "Số liệu nhỏ nhất là 0",
};

let messages = {
    co_so_id: {
        min: "Vui lòng chọn cơ sở",
    },
    nghe_id: {
        min: "Vui lòng chọn ngành nghề",
    },
    nam: {
        min: "Vui lòng chọn năm",
    },
    dot: {
        min: "Vui lòng chọn đợt",
    },
};
listField.forEach(function(value) {
    messages[value] = mess;
});
$("#validate-form-add").validate({
    rules: rules,
    messages: messages,
});
//endphuc validate js
var arrcheck = [];

function getdatacheck(id) {
    var datacheck = {
        id: $(id).attr("name"),
        value: $(id).val(),
    };
    var check = 0;

    if (arrcheck.length == 0) {
        check = 1;
        arrcheck.push(datacheck);
    } else {
        for (let index = 0; index < arrcheck.length; index++) {
            if (datacheck.id == arrcheck[index].id) {
                check = 1;
                arrcheck[index].value = datacheck.value;
                break;
            }
        }
    }

    if (check == 0) {
        arrcheck.push(datacheck);
    }

    if (arrcheck.length == 4) {
        axios
            .post(routeCheck, {
                datacheck: arrcheck,
            })
            .then(function(response) {
                console.log(response.data);
                if (response.data.result == 1) {
                    swal("Dữ liệu đã tồn tại và được phê duyệt", {
                        buttons: ["OK"],
                    });
                    removeselect();
                } else if (response.data.result != 2) {
                    swal("Dữ liệu đã tồn tại mời chuyển đến trang chỉnh sửa", {
                        buttons: ["Hủy", true],
                    }).then((thanhcong) => {
                        if (thanhcong != null) {
                            window.location = response.data.result;
                        }
                    });
                    removeselect();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    }
}

function removeselect() {
    arrcheck = [];
    $("#co_so_dao_tao").select2().val("").trigger("change");
    $("#nam").select2().val("").trigger("change");
    $("#dot").select2().val("").trigger("change");
}