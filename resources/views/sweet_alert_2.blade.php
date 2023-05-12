<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<div class="container">

    <form id="upload_form" action="{{ route('sweetalert_email_store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control email" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="email">
        </div>

        <button id="submit" class="btn btn-primary submit" data-swal-toast-template="#my-template">Submit</button>
    </form>
</div>
<br>
<br>
<br>
<hr>
<div class="container">
    <button class="btn btn-primary click_me">click me</button>
</div>
<template id="my-template">
    <swal-title>
        Save changes to "Untitled 1" before closing?
    </swal-title>
    <swal-icon type="warning" color="red"></swal-icon>
    <swal-button type="confirm">
        Save As
    </swal-button>
    <swal-button type="cancel">
        Cancel
    </swal-button>
    <swal-button type="deny">
        Close without Saving
    </swal-button>
    <swal-param name="allowEscapeKey" value="false" />
    <swal-param name="customClass" value='{ "popup": "my-popup" }' />
    <swal-function-param name="didOpen" value="popup => console.log(popup)" />
</template>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    // Swal.fire({
    //     title: 'Error!',
    //     text: 'Do you want to continue',
    //     icon: 'error',
    //     confirmButtonText: 'Cool'
    // });
    $(document).ready(function() {
        $('.click_me').on('click', function(e) {
            e.preventDefault();

            (async () => {

                const ipAPI = '//api.ipify.org?format=json';

                const inputValue = fetch(ipAPI)
                    .then(response => response.json())
                    .then(data => data.ip)

                const {
                    value: ipAddress
                } = await Swal.fire({
                    title: 'Enter your IP address',
                    input: 'text',
                    inputLabel: 'Your IP address',
                    inputValue: inputValue,
                    showCancelButton: true,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'You need to write something!'
                        }
                    }
                })

                if (ipAddress) {
                    Swal.fire(`Your IP address is ${ipAddress}`)
                }

            })()

        })
    })

    $(document).ready(function() {
        $('.submit').on('click', function(e) {
            e.preventDefault();
            var url = "{{ route('sweetalert_email_store') }}";
            var form_data = new FormData(document.getElementById("upload_form"));



            Swal.fire({
                    title: 'Sweet!',
                    text: 'Sending Your Email.',

                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText: '<i class="fa fa-thumbs-down"></i>Cancel',
                    cancelButtonAriaLabel: 'Thumbs down',
                    timer: 10000

                })
                .then(function(result) {
                    if (result.isConfirmed) {

                        $.ajax({
                            headers: {
                                'X-CSRF-Token': '{{ csrf_token() }}'
                            },
                            url: url,
                            data: form_data,
                            dataType: 'json',
                            type: 'post',
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        "Submitted!",
                                        "Your file has been Submited.",
                                        "success"
                                    )
                                }
                            }
                        })
                    } else if (result.isDenied) {
                        Swal.fire(
                            "Error!",
                            "Your file did not submitted.",
                            "error"
                        )
                    }
                });


        })

    })
</script>
{{-- <script>
        $(document).ready(function() {
            $('.submit').on('click', function(e) {
                e.preventDefault();
                var url = "{{ route('sweetalert_email_store') }}";
                var form_data = new FormData(document.getElementById("upload_form"));
                swal({
                    title: "want to submit!",
                    text: "Please check your data entered before submit !",
                    icon: "warning",
                    buttons: true
                }).then((willComment) => {
                    if (willComment) {
                        swal({
                            title: "Processing",
                            text: "processing your data ",
                            //icon: "warning", //Success, warning, info, error
                            buttons: false,
                            dangerMode: true,
                        });
                        $.ajax({
                            headers: {
                                'X-CSRF-Token': '{{ csrf_token() }}'
                            },
                            url: url,
                            data:form_data,
                            dataType: 'json',
                            type: 'post',
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(response) {
                                if (response.success) {
                                    swal({
                                        title: "Success!",
                                        text: "Your Data has been submitted !",
                                        icon: "success",
                                        // buttons: true
                                    })
                                }
                            }
                        })
                    }
                })
            })

        })
    </script> --}}


</body>

</html>
