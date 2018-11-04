//============== for print div  contant ================//
function PrintElem(elem)
{
    Popup($(elem).html());
}
function Popup(data)
{
    var mywindow = window.open('', 'my div', 'height=400,width=600');
    mywindow.document.write('<html><head><title>my div</title>');
    /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10

    mywindow.print();
    mywindow.close();
    return true;
}

$(document).ready(function () {
//=================== ajax  pagnation table  ========================//
    $(document).on('click', '.ajax-pagination .pagination a', function (event) {
        event.preventDefault();
        var pageinate = $(this).attr('href');
        $.get(pageinate, function (data) {
            $('.loop').html(data);
        });
        return false;
    });//pagination

//////////////////  add by ajax //////////////
    $(document).on('submit', '.ajax-form-request', function (event) {
        event.preventDefault();
        $('.ajaxMessage').remove();
        $('*').removeClass('has-error');
        var thisForm = $(this);
        var formAction = thisForm.attr('action');
        var formMethod = thisForm.attr('method');
        // var formData   =  thisForm.serialize();
        var formData = new FormData(this);

        $.ajax({
            url: formAction,
            type: formMethod,
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(thisForm).find('#submit').append(' <i class="fa fa-spinner fa-pulse"></i> ').attr('disabled', 'disabled');
            },
            success: function (data) {
                if (data.status == 'true')
                {
                    $('.message').prepend('<div class=" ajaxMessage alert alert-success">' + data.message + '</div>');
                 }
                else
                {
                    $('.message').prepend('<div class="alert alert-danger ajaxMessage">' + data.message + '</div>');
                }

            },
            error: function (data) {
                var errors = data.responseJSON;
                $.each(errors, function (index, val) {
                    $(thisForm).find('[name=' + '' + index + '' + ']').addClass('invalid');
                    $(thisForm).find('[name=' + '' + index + '' + ']').parent().append('<small class="error ajaxMessage">' + val + '</small>');
                });

            },
            complete: function () {
                $(thisForm).find('#submit').find('.fa').remove();
                $(thisForm).find('#submit').prop('disabled', false);
            },
        });//ajax

        return false;


    });//ajax-form-request  






//update-ajax-form-request  
    $(document).on('submit', '.update-ajax-form-request', function (event) {
        event.preventDefault();
        $('.ajaxMessage').remove();
        $('*').removeClass('has-error');

        var thisForm = $(this);
        var formAction = thisForm.attr('action');
        var formMethod = thisForm.attr('method');
        var formData = new FormData(this);

        var hasEnctype = thisForm.attr('enctype');
        $.ajax({
            url: formAction,
            type: formMethod,
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(thisForm).find('#submit').append(' <i class="fa fa-spinner fa-pulse"></i> ').attr('disabled', 'disabled');

            },
            success: function (data) {
                if (data.status == 'true')
                {
                    $('.message').prepend('<div class=" ajaxMessage alert alert-success">' + data.message + '</div>');
                }
                else
                {
                    $('.message').prepend('<div class="alert alert-danger ajaxMessage">' + data.message + '</div>');
                }

            },
            error: function (data) {
                var errors = data.responseJSON;
                $.each(errors, function (index, val) {
                    $(thisForm).find('[name=' + '' + index + '' + ']').addClass('invalid');
                    $(thisForm).find('[name=' + '' + index + '' + ']').parent().append('<small class="error ajaxMessage">' + val + '</small>');
                });

            },
            complete: function () {
                $(thisForm).find('#submit').find('.fa').remove();
                $(thisForm).find('#submit').prop('disabled', false);
            },
        });//ajax

        return false;


    });//update-ajax-form-request   





//========= serarch input ================//
    $(document).on('keyup', '.searchInput', function (event) {
        event.preventDefault();
        var thisInput = $(this);
        var thisForm = $(this).closest('form');
        var formAction = thisForm.attr('action');
        var formMethod = thisForm.attr('method');
        var formData = thisForm.serialize();
        $.ajax({
            url: formAction,
            type: formMethod,
            dataType: 'json',
            data: formData,
            success: function (data) {
                $('.data').html(data);
            },
        });
        return false;

    });
});
$(document).on('click', '.cc', function (event) {
    var thisid = $(this).attr('id');
    if (!$(this).is(':checked')) {
        $("." + thisid).prop("checked", false);
    }
    else {
        $("." + thisid).prop("checked", true);
    }

});



function Append()
{
     var name = document.getElementById('name').value;
     if ( name == "" )
    {
        document.getElementById('errorhhcol').innerHTML = "Enter Properity Name";
    }
    else
    {
        document.getElementById('errorhhcol').innerHTML = "";
        document.getElementById('names').value += name + ",";
         document.getElementById('doncol').innerHTML += "<tr style='border-bottom: #164040; border-bottom-style: solid;'><td>"+ name +"</td></tr>";

    }


}
