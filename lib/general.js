jQuery(document).ready(function ($) {
    $("#btn-load-json").on("click", function () {
            $.ajax(
                {
                    url: 'https://jsonplaceholder.typicode.com/users',
                    method: 'GET',
                    dataType: 'json',
                    success: function (result) {
                        $('#jsonTable').css("visibility", "visible").css("border", "1px solid green");
                        $('#jsonTable').append("<tbody>");
                        for (var counter = 0; counter < result.length; counter++) {
                            $('#jsonTable').append("<tr><td>" + result[counter].id + "</td><td>" + result[counter].name + "</td><td>" + result[counter].username + "</td></tr>");
                        }
                        $('#jsonTable').append("</tbody>");
                        $('th').css("border", "1px solid green");
                    },
                    error: function () {
                        console.log("error");
                    }
                }
            );
        }
    );}
);