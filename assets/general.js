jQuery(document).ready(
    function ($) {
        $('.em-jsonTable-wrapper').prepend().before('<div class="em-jsonTable-loader"></div>'); // initial loader icon for all users request
        $.ajax(
            {
                url: 'https://jsonplaceholder.typicode.com/users',
                method: 'GET',
                cache: true,
                dataType: 'json',
                success: function (result) {
                    setTimeout( // timeout function to transition from loader icon to content less abruptly
                        function () {
                            $(".em-jsonTable-loader").remove();
                            $('#jsonTable').css("visibility", "visible");
                            $('#jsonTable').append("<tbody>");
                            for (var counter = 0; counter < result.length; counter++) {
                                $('#jsonTable').append("<tr><td class='typicode_userid'><a href='#'>" + result[counter].id + "</a></td><td class='typicode_name'><a href='#'>" + result[counter].name + "</a></td><td class='typicode_username'><a href='#'>" + result[counter].username + "</a></td></tr>");
                            }
                             $('#jsonTable').append("</tbody>");
                        },
                        3000
                    );
                    setTimeout( // wait for html table to load before targeting these elements
                        function () {
                            $(".typicode_userid , .typicode_name , .typicode_username").on(
                                "click", function (event) {
                                    event.preventDefault();
                                    $([document.documentElement, document.body]).animate({scrollTop: $("#jsonTable-ld-top").offset().top},);
                                    $(".em-jsonTable-loader").remove();
                                    $(".em-json-user-wrapper").remove();
                                    $('.em-jsonTable-wrapper').prepend().before('<div class="em-jsonTable-loader"></div>');
                                    $typicode_userid = $(this).closest('tr').find('.typicode_userid').text();
                                    $.ajax(
                                        {
                                            url: 'https://jsonplaceholder.typicode.com/users/' + $typicode_userid + '',
                                            method: 'GET',
                                            cache: true,
                                            dataType: 'json',
                                            success: function (result_indiv_user) {
                                                setTimeout( // timeout function to transition from loader icon to content less abruptly
                                                    function () {
                                                        $(".em-jsonTable-loader").remove();
                                                        $('.em-jsonTable-wrapper').prepend().before(
                                                            "<div class='em-json-user-wrapper'><h2 class='em-json-user-name'>User: " + result_indiv_user.name + "</h2><ul><li>Id: " + result_indiv_user.id + "</li><li>Name: " + result_indiv_user.name + "</li><li>Username: " + result_indiv_user.username + "</li>" +
                                                            "<li>Street address: " + result_indiv_user.address.street + "</li><li>Suite adress: " + result_indiv_user.address.suite + "</li><li>City: " + result_indiv_user.address.city + "</li>" +
                                                            "<li>Zipcode: " + result_indiv_user.address.zipcode + "</li><li>Geo Lat: " + result_indiv_user.address.geo.lat + "</li><li>Geo Lng: " + result_indiv_user.address.geo.lng + "</li>" +
                                                            "<li>Phone: " + result_indiv_user.phone + "</li><li>Website: " + result_indiv_user.website + "</li><li>Company Name: " + result_indiv_user.company.name + "</li>" +
                                                            "<li>Company catchphrase: " + result_indiv_user.company.catchPhrase + "</li><li>Company bs: " + result_indiv_user.company.bs + "</li></ul>" +
                                                            "<p class='em-json-loadmore'>Load another user by click information on the table below.</p></div>"
                                                        );
                                                        $([document.documentElement, document.body]).animate(
                                                            {scrollTop: $(
                                                                "#jsonTable-ld-top"
                                                            )
                                                            .offset().top},
                                                        );
                                                    },
                                                    3000
                                                );

                                            },
                                            error: function () {
                                                // error message for html table of all users
                                                setTimeout( // timeout function to transition from loader icon to content less abruptly
                                                    function () {
                                                        $(".em-jsonTable-loader").remove();
                                                        $('.em-jsonTable-wrapper').prepend().before(
                                                            "<div class='em-json-user-wrapper'><p class='em-json-error-msg'>Server request failed. Our services may be too busy at this time please check back later.</p>"
                                                        );
                                                        $([document.documentElement, document.body]).animate(
                                                            {scrollTop: $(
                                                                "#jsonTable-ld-top"
                                                            )
                                                                    .offset().top},
                                                        );
                                                    },
                                                    3000
                                                );
                                            }
                                        }
                                    );

                                }
                            );
                        },
                        3001
                    );

                },
                error: function () {
                    // error message for individual user request
                    setTimeout( // timeout function to transition from loader icon to content less abruptly
                        function () {
                            $(".em-jsonTable-loader").remove();
                            $('.em-jsonTable-wrapper').prepend().before(
                                "<div class='em-json-user-wrapper'><p class='em-json-error-msg'>Server request failed. Our services may be too busy at this time please check back later.</p>"
                            );
                            $([document.documentElement, document.body]).animate(
                                {scrollTop: $(
                                    "#jsonTable-ld-top"
                                )
                                        .offset().top},
                            );
                        },
                        3000
                    );

                }
            }
        );
    }
);