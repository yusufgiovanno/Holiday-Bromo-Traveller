import $ from 'jquery';
import Swal from 'sweetalert2';

const home = () => {
    const init = () => {
        submitForm();
    }

    const submitForm = () => {
        $(document).on('submit', '#planner-form', function (e) {
            e.preventDefault();
            let data = new FormData(this);

            data.append('action', vars.ajax.planner.action);
            data.append('nonce',  vars.ajax.planner._token);

            $.ajax({
                type: "POST",
                url : vars.ajaxUrl,
                data: data,
                contentType:false,
                processData:false,
                dataType: "json",
            }).done((res) => {
                Swal.fire(res.data.message);
            });
        });
    };

    init();

}

try {
    $(function () {
        home();
    });
} catch (error) {
    console.error('Error initializing home.js:', error);
}
