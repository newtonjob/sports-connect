"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Set a global error message
 * @type {string}
 */
const ERROR_GLOBAL = "Oops! Something went wrong. Let's try that again";


function notify(message, type)
{
    $.notify({ message: message }, { type: type });
}


function checkAll(a, b)
{
    $(b + ':visible').prop('checked', $(a).is(':checked')).change();
}


let spinner = '<span style="margin-left: 5px" class="ml-2 spinner spinner-border spinner-border-sm"></span>';

function submitForm(form_id, callback, should_notify = true)
{
    let form = $(form_id);

    if (form.attr('enctype') === 'multipart/form-data') {
        return submitFormMultipart(form_id, callback, should_notify);
    }

    let form_data = form.serializeArray();

    // Add the spinner and disable the submit button.
    form.find('[type=submit]').append(spinner).prop('disabled', true);

    return $.post(form.attr('action'), form_data, response => {
        if (should_notify) {
            notify(response.message, 'success');
        }

        // Run the supplied callback, passing the response.
        if (callback) {
            callback(response, form);
        }
    }, 'json').fail(({responseJSON}) => {
        notify(responseJSON ? responseJSON.message : ERROR_GLOBAL, 'danger');
    }).always(() => {
        // Remove the spinner and re-enable the submit button.
        form.find('[type=submit]').prop('disabled', false).find('.spinner').remove();
    });
}


function submitFormMultipart(form_id, callback, should_notify = true)
{
    let form  = $(form_id);
    let form_data = new FormData(form[0]);

    // Add the spinner and disable the submit button.
    form.find('[type=submit]').append(spinner).prop('disabled', true);

    return $.ajax({
        url:		form.attr('action'),
        type:		'POST',
        data:		form_data,
        contentType: false,
        processData: false,
        dataType:	'json',
        cache:		false,
        success: response => {
            if (should_notify) {
                notify(response.message, 'success');
            }

            // Run the supplied callback, passing the response.
            if (callback) {
                callback(response, form);
            }
        },
        error: ({responseJSON}) => {
            notify(responseJSON ? responseJSON.message : ERROR_GLOBAL, 'danger');
        },
        complete: () => {
            // Remove the spinner and re-enable the submit button.
            form.find('[type=submit]').prop('disabled', false).find('.spinner').remove();
        }
    });
}


function getRequest(url, callback, should_notify = true)
{
    // If an anchor element object was passed instead, then use the href attribute as target URL.
    url = (typeof(url) === "object") ? $(url).attr('href') : url;

    // Grab the button
    let btn = $('[href="'+url+'"], [data-href="'+url+'"]');

    let preloader = btn.find('.preloader');

    preloader.css('display', 'inline-block');

    // Disable the button
    btn.prop('disabled', true);

    return $.get(url, response => {
        if (should_notify) {
            notify(response.message, 'success');
        }

        // Run the supplied callback, passing the response.
        if (callback) {
            callback(response);
        }
    }, 'json').fail(({responseJSON}) => {
        notify(responseJSON ? responseJSON.message : ERROR_GLOBAL, 'danger');
    }).always(() => {
        // Reset the defaults
        preloader.hide();
        btn.prop('disabled', false);
    });
}



/**
 * -----------------------------------------------------
 * A wrapper around very common usages.
 * -----------------------------------------------------
 *
 * Simply add the class 'x-submit' to your form, and you're done.
 */
$(document).on('submit', '.x-submit', function(e) {
    e.preventDefault();

    let form = this;

    if ($(form).data('confirm')) {
        return swal({
            title: $(form).data('swal-title') ?? "Sure?",
            text: $(form).data('swal-text') ?? "Please confirm you want to proceed with this request...",
            icon: "warning",
            buttons: ['Nevermind', {
                text: $(form).data('swal-btn') ?? "Yes, proceed",
                closeModal: false,
            }],
            dangerMode: $(form).data('swal-danger') ?? true
        }).then((confirm) => {
            if (confirm) {
                let xhr = callSubmitForm(form).always(() => swal.close());

                // If the user clicked cancel, Let's abort the request...
                $(document).on('click', '.swal-button--cancel', xhr.abort);
            }
        });
    }

    callSubmitForm(form);
});

const callSubmitForm = (form) => (
    submitForm(form, function (response, form) {
        // Close any open modals
        $('.modal').modal('hide');
        //$('.modal-backdrop').hide();

        form[0].dispatchEvent(new CustomEvent('finish', { detail: response }));

        if (response.data.redirect ?? null) {
            return location.href = response.data.redirect;
        }

        let callback = form.data('then');

        if (! callback) {
            return;
        }

        if (callback === 'reload') {
            return location.reload();
        }

        if (callback.startsWith('redirect:')) {
            return location.href = callback.substring(9);
        }

        if (callback === 'alert') {
            return swal(response.title, response.message, 'success');
        }

        if (callback === 'reset') {
            return form[0].reset();
        }

        if (callback === 'livewire:refresh') {
            return Livewire.emit('refresh');
        }

        if (callback.startsWith('livewire:refresh.')) {
            return Livewire.emitTo(callback.substring(17), 'refresh');
        }

        return window[callback](response, form);
    }, ! ($(form).data('quietly') ?? false))
);
