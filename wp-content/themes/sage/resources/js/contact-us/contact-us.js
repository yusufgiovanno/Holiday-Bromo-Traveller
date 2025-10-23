import $ from 'jquery';
import Swal from 'sweetalert2';

const contact = () => {
    const init = () => {
        if ($('#contact-form').length < 1) return;
        submitForm();
    }

    const submitForm = () => {
        $(document).on('submit', '#contact-form', function (e) {
            e.preventDefault();
            let data = new FormData(this);

            data.append('action', vars.ajax.contact.action);
            data.append('nonce',  vars.ajax.contact._token);

            $.ajax({
                type: "POST",
                url : vars.ajaxUrl,
                data: data,
                contentType:false,
                processData:false,
            }).done((res) => {
                Swal.fire(res.data.message);
            });
        });
    };

    init();

}

try {
    $(function () {
        contact();
    });
} catch (error) {
    console.error('Error initializing contact-us.js:', error);
}
