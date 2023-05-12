<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <style>
        body {
            background-color: aliceblue;
            font-family: sans-serif;
            text-align: center;
        }

        button {
            background-color: cadetblue;
            color: whitesmoke;
            border: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 7px;
            padding: 15px 35px;
            cursor: pointer;
            white-space: nowrap;
            margin: 10px;
        }

        img {
            width: 200px;
        }

        input[type="text"] {
            padding: 12px 20px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        h1 {
            border-bottom: solid 2px grey;
        }

        #success {
            background: green;
        }

        #error {
            background: red;
        }

        #warning {
            background: coral;
        }

        #info {
            background: cornflowerblue;
        }

        #question {
            background: grey;
        }
    </style>
</head>


<body>

    <body>
        <div>

            <div>

                <p>Sweet alert with modal type and customize message alert with html and css</p>
                <button id="success">Success</button>
                <button id="error">Error</button>
                <button id="warning">Warning</button>
                <button id="info">Info</button>
                <button id="question">Question</button>
            </div>
            <br>
            <div>
                <h4>Custom image and alert size</h4>
                <p>Alert with custom icon and background icon</p>
                <button id="icon">Custom Icon</button>
                <button id="image">Custom Background Image</button>
            </div>
            <br>
            <div>
                <h4>Alert with input type</h4>
                <p>Sweet Alert with Input and loading button</p>
                <button id="subscribe">Subscribe</button>
            </div>
            <br>

        </div>
    </body>
    <div class="container">
        <form action="{{ route('sweetalert_email_store') }}" id="upload_form">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control email" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email">
            </div>

            <button id="submit" class="btn btn-primary submit">Submit</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
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
    </script>
    <script>
        // Alert Modal Type
        $(document).on('click', '#success', function(e) {
            swal(
                // 'Success',
                // 'You clicked the <b style="color:green;">Success</b> button!',
                // 'success'
                {
                    button: "Aww yiss!"
                }
            )
        });

        $(document).on('click', '#error', function(e) {
            swal(
                'Error!',
                'You clicked the <b style="color:red;">error</b> button!',
                'error'
            )
        });

        $(document).on('click', '#warning', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        });

        $(document).on('click', '#info', function(e) {
            swal(
                'Info!',
                'You clicked the <b style="color:cornflowerblue;">info</b> button!',
                'info'
            )
        });

        $(document).on('click', '#question', function(e) {
            swal(
                //     {
                //     title: "Question!",
                //     text: "You clicked the button!",
                //     confirmButtonText: "info",
                // }
                'Question!',
                'You clicked the <b style="color:grey;">question</b> button!',
                'question'
            )
        });

        // Alert With Custom Icon and Background Image
        $(document).on('click', '#icon', function(event) {
            swal({
                title: 'Custom icon!',
                text: 'Alert with a custom image.',
                imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/640px-Image_created_with_a_mobile_phone.png',
                imageWidth: 200,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true
            })
        });

        $(document).on('click', '#image', function(event) {
            swal({
                title: 'Custom background image, width and padding.',
                width: 700,
                padding: 150,
                background: '#fff url(https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/640px-Image_created_with_a_mobile_phone.png)'
            })
        });

        // Alert With Input Type
        $(document).on('click', '#subscribe', function(e) {
            swal({
                title: 'Submit email to subscribe',
                input: 'email',
                inputPlaceholder: 'Example@email.xxx',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: (email) => {
                    return new Promise((resolve) => {
                        setTimeout(() => {
                            if (email === 'example@email.com') {
                                swal.showValidationError(
                                    'This email is already taken.'
                                )
                            }
                            resolve()
                        }, 2000)
                    })
                },
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    swal({
                        type: 'success',
                        title: 'Thank you for subscribe!',
                        html: 'Submitted email: ' + result.value
                    })
                }
            })
        });

        // Alert Redirect to Another Link
        $(document).on('click', '#link', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "You will be redirected to https://utopian.io",
                    type: "warning",
                    confirmButtonText: "Yes, visit link!",
                    showCancelButton: true
                })
                .then((result) => {
                    if (result.value) {
                        window.location = 'https://utopian.io';
                    } else if (result.dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            'Your stay here :)',
                            'error'
                        )
                    }
                })
        });
    </script>


</body>

</html>
