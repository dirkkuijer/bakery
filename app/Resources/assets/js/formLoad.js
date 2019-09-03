function Reveal(size, origin) {
    var el = document.createElement('div');
    el.className = "reveal " + size;
    el.setAttribute("data-reveal", "");
    el.setAttribute("role", "dialog");
    el.setAttribute("data-options", "closeOnClick:false;");
    el.revealobject = this;
    el.innerHTML = '';
    this.origin = origin;
    this.el = document.body.appendChild(el);
    eventListeners(this.el);
    $(this.el).on('closed.zf.reveal', function(event, large) {
        $(this).closest('div.reveal-overlay').remove();

        return false;
    });
    $(this.el).on('closeme.zf.reveal', function(event, large) {

        return false;
    });
}
function changeFormResult() {

    $('form[formresult="json"]').submit(function(e) {

        var formElm = $(this);
        var reveal = $(this).closest('.reveal').get(0).revealobject;
        e.preventDefault();

        try {

            var formUrl = $(formElm).attr('action');
            var formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: formUrl,
                data: formData,
                async: true,
                success: function(response)
                {
                    var selectElm = $(reveal.origin).closest('.form-collection-add').find('select').first();
                    selectElm.append(
                        $('<option>', { value: response.id }).text(response.name)
                    );
                    selectElm.val(response.id);

                    formElm.closest('.reveal').foundation('close');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {

                },
            });
        }
        catch(ex) {
            alert(ex.message);
        }

        return false;
    });
}
function eventListeners(scope) {
    scope = scope || document;
    var dateFormat = 'dd-mm-yy';
    var datepickerSettings = {
        dateFormat: dateFormat,

        showWeek: true,
        numberOfMonths: 1,
        prevText: ' ',
        nextText: ' ',
        weekHeader: ' ',
        firstDay: 1,
        dayNames: [ 'Zondag', 'Mandaag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag' ],
        dayNamesMin: [ 'Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za' ],
        monthNames: [ 'Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December' ],
        monthNamesShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec' ],
        beforeShow: function(input, inst) {
            $('#ui-datepicker-div').addClass('standalone-datepicker');
        }
    };
}


window.Reveal = Reveal

$(document).ready(function(){

    var pathTouchMoved = false;
        $('body').on('click touchend', '[data-path]', function(e) {

            if (pathTouchMoved != true) {

                e.preventDefault();

                $(this).disabled = true;

                var path = $(this).attr("data-path");
                //if (path[0] !== '/')
                //    Routing.generate(path);
                //console.log(path);

                var size = $(this).attr("data-reveal-size");
                var origin = this;

                var reveal = new Reveal(size ? size : 'large', origin);
                var elementToOpen = $(this).attr("data-open-element");

                $.ajax({
                    type: 'GET',
                    url: path,
                    success: function(data) {

                        $(reveal.el).foundation();
                        $(reveal.el).html(data).foundation('open');
                        $('> div', reveal.el).foundation();

                        changeFormResult();
                        eventListeners();

                        if (elementToOpen) {
                            $(elementToOpen).select2('open');
                        }
                        else {
                            // focus first visible field in form
                            $('form').find('*').filter(':input:visible:first').focus();
                        }
                    }
                });
            }
        }).on('touchmove', function(e){
            pathTouchMoved = true;
        }).on('touchstart', function(){
            pathTouchMoved = false;
        });

});

    console.log("formLoad loaded");