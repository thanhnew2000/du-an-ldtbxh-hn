
    let nodeList = document.querySelectorAll(".m-input");
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
    };
    listField.forEach(function(value) {
        rules[value] = rule;
    });

    const mess = {
        number: "Vui lòng nhập liệu hợp lệ",
        digits: "Vui lòng nhập số nguyên lớn hơn 0",
    };
    let messages = {       
    };
    listField.forEach(function(value) {
        messages[value] = mess;
    });
    $("#validate-form").validate({
        rules: rules,
        messages: messages,
    });