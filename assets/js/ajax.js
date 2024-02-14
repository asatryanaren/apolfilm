// function funcBefore() {
//     $().text ("Ожидание данных...");
// }
// function funcSucces() {
//     $().text (data);
// }
//
// $(document).ready(function () {
//     $("#commentBtn").bind("click",function() {
//         let admin = "admin";
//         $.ajax ({
//             url: "",
//             type: "POST",
//             data: ({name: admin, number: 5}),
//             dataType: "html",
//             beforeSend: funcBefore,
//             success: funcSucces
//         });
//     });
// });