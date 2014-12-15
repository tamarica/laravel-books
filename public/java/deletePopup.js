/**
 * Created by tamar on 10/4/14.
 */

$(function () {
$('#delete-event').click(function (event) {

    var bookId = $('#del').val().trim();
    $('#visible').show();
    $('.greenLinks').append('<div class="popup" >are u sure u want to delete this book?<br>' +
        '<button id="yes" type="hidden" class="button size" >yes</button><button id="no" class="button size">no</button></div>');

    $('#yes').click(function () {

        $.ajax({
            url: '/books/'+bookId,
            type: 'DELETE',
            cache: false
        }).done(function (data) {
            try {
                if (data == 'ok') {

                    $('#visible').hide();
                    $('.popup').hide();

                    window.location.replace("/books");
                }

            }

            catch (error) {
                console.dir(error);
            }
        });

    });

    $('#no').click(function () {
        $('#visible').hide();
        $('.popup').hide();

        window.location.replace('/books/'+bookId);


    });


});

});

