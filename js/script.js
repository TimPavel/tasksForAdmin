$('#btnSubmit').on('click', function(e) {
    e.preventDefault();
    let user = {
        login: $('#login').val(),
        password: $('#password').val(),
    };

    $.post(
        '/test.php?action=input',
        {user: user},
        function (response, status) {
            response = $.parseJSON(response);

            console.log(typeof(response));
            console.log(response.login);
            console.log(status);
            // console.log(response['password']);
        });
});

$('#btnSubmitTask').on('click', function() {
    // e.preventDefault();
    let task = {
        taskName: $('#taskName').val(),
        taskDescription: $('#taskDescription').val(),
    };

    $.ajax({
        type: 'POST',
        url: 'Task/insert',
        data: task,
        dataType: 'text',
        success: function (data) {
            $("#taskContainer").prepend("<div id=task"+ data + "> " +
                "<h3>Наименование задачи: " + task.taskName + "</h3>" +
                "<p>Описание задачи: " + task.taskDescription + "</p>" +
                // "<label for=\"checkboxForAdmin\">Установить одобренным: </label>"+
                // "<input id=\"checkboxForAdmin\"\n type=\"checkbox\"\n" +
                // "data-id=" + data + " >"+
                "<p>Статус: <span>Не одобрено админом</span></p>"+
                "</div>");
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }

    });
    return false;
});


$("#taskContainer").on('click', 'input:checkbox', function() {

    let taskId = {
        id: this.dataset.id
    };
    let that = $(this);
    $.ajax({
        type: 'POST',
        url: '/Task/update',
        data: taskId,
        dataType: 'text',
        success: function (data, response) {
            console.log(data);
            console.log(response);
            that.next().find("span").text('Одобрено админом');
            that.parent().css( "background-color", "green" );
            that.parent().find('label').remove();
            that.remove();},
        error: function () {
            console.log('Ошибка');
        }
    });
});


//
// $('#btnLogin').on('click', function() {
//     let user = {
//         login: $('#login').val(),
//         password: $('#password').val()
//     };
//
//     $.ajax({
//         type: 'POST',
//         url: '/User/login',
//         data: user,
//         dataType: 'text',
//         success: function (data, response) {
//             console.log(data);
//             console.log(response);
//         },
//         error: function () {
//             console.log('Ошибка');
//         }
//     });
//
// });
//
// $('#btnRegistration').on('click', function() {
//     let user = {
//         username: $('#username').val(),
//         login: $('#login').val(),
//         password: $('#password').val()
//     };
//
//     $.ajax({
//         type: 'POST',
//         url: '/User/registration',
//         data: user,
//         dataType: 'text',
//         success: function (data, response) {
//             console.log(data);
//             console.log(response);
//         },
//         error: function () {
//             console.log('Ошибка');
//         }
//     });
//
// });