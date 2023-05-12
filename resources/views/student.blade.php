<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_yU9pJxAP7_h1YlGOpMPBHgZrpPkoc9k&libraries=places&callback=initAutocomplete"
        async></script>




    <style>
        .bar {
            background-color: green;
        }

        .percent {
            position: absolute;
            left: 50%;
            color: black;
        }
    </style>

</head>

<body>
    <h1>Hello, world!</h1>

    <div id="SuccessMessage"></div>


    <!-- Add Student Modal -->
    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Student </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3" id="">
                        <form class="form-group mb-3" id='add_form_data' method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <label>Student name</label>
                            <input type="text" class="form-control name" name="name">
                            <label>Student Email</label>
                            <input type="text" class="form-control email" name="email">
                            <label>Student Phone</label>
                            <input type="text" class="form-control phone" name="phone">
                            <label>Student Course</label>
                            <input type="text" class="form-control course" name="course">
                            <label>Student Image</label>
                            <input type="file" class="form-control image" name="image">


                            <div class="progress mb-3">
                                <div class="bar"></div>
                                <div class="percent">0%</div>
                            </div>

                            <div id="status"></div>
                            <div class="upload_pro"></div>
                            {{-- <input class="form-control" placeholder="Enter Location" id="placeInput" name="address"/> --}}
                        </form>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="add_student" class="btn btn-primary add_student">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- End Of Student Modal --}}


    {{-- edit modal --}}
    <div class="modal fade" id="EditStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Student Update</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label>Student name</label>
                        <input type="text" class="form-control name" name="name">
                        <label>Student Email</label>
                        <input type="text" class="form-control email" name="email">
                        <label>Student Phone</label>
                        <input type="text" class="form-control phone" name="phone">
                        <label>Student Course</label>
                        <input type="text" class="form-control course" name="course">

                        <label>Student Image</label>
                        <input type="Input" class="form-control image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="add_student" class="btn btn-primary add_student">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="image_upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Image</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <form class="form-group" method="post" enctype="multipart/form-data" id="upload_form">
                            <Label>Image</Label>
                            {{ csrf_field() }}
                            <input type="file" id="image" value="" name="image">

                            <div class="form-group">
                                <div class="progress mb-3">
                                    <div class="bar"></div>
                                    <div class="percent">0%</div>
                                </div>
                            </div>
                            <p class="upload_img"></p>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="upload" class="btn btn-primary add_image">Uploadnhhh Image</button>
                </div>
            </div>
        </div>
    </div>



    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete Student </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">

                        <input type="hidden" class="form-control " id="DeleteStudentId">
                        <h4>You want to delete</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="" class="btn btn-primary delete_student_btn">Delete</button>
                </div>
            </div>
        </div>
    </div>




    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Detail
                            <button class="btn btn-danger float-end btn-sm removeAll mb-2">Remove All Data</button>
                            <a href="#" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal"
                                data-bs-target="#AddStudentModal">Add Student</a>
                            <a href="#" class="btn btn-info float-end btn-sm" data-bs-toggle="modal"
                                data-bs-target="#image_upload">Upload Image </a>

                        </h4>

                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <th><input type="checkbox" id="checkboxesMain"></th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th id="image">Image</th>
                                <th>Operation</th>

                            </thead>

                            <tbody>

                        </table>


                    </div>
                </div>
            </div>
            <div class="container">
                <img src="" id="image">
            </div>
            <div class="container">
                <div class="row mt-3">
                    <div class="col-6 offset-3" id="g_input">
                        <input class="form-control" placeholder="Enter Location" id="placeInput" />
                    </div>
                </div>
                <form id="addr_form" method="post">
                    @csrf

                    <label>Name</label><br>
                    <input type="text" id="name" name="name" /><br>
                    <label>City</label><br>
                    <input type="text" id="txtCity" name="city" /><br>
                    <label>State</label><br>
                    <input type="text" id="txtState" name="state" /><br>
                    <label>Zip</label><br>
                    <input type="text" id="txtZip" name="zip" /><br>
                    <label>Country</label><br>
                    <input type="text" id="txtCountry" name="country" /><br>
                    <label>landmark</label><br>
                    <input type="text" id="landmark" name="landmark" /><br>
                    <label>street</label><br>
                    <input type="text" id="street" name="street" /><br>
                    <label>Local Area</label><br>
                    <input type="text" id="local_area" name="local_area" /><br>
                    <label>Local route</label><br>
                    <input type="text" id="route" name="route" /><br>
                    <input type="submit" class="btn btn-primary btn-sm" name="submit" id="addr_submit">

                </form>
            </div>



        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>


        <script>
            $(document).ready(function() {


                var url = "{{ route('student.fetch') }}";
                // alert(url)
                fetchStudent();

                function fetchStudent() {
                    $.ajax({
                        type: 'get',
                        url: url,
                        dataType: "json",
                        success: function(response) {

                            console.log(response.students);
                            $('tbody').html('')
                            $.each(response.students, function(key, item) {
                                var row = $("<tr>\
                                            <td><input type='checkbox' class='checkbox' value='" + item.id + "'</td>\
                                            <td>" + item.id + "</td>\
                                            <td>" + item.name + "</td>\
                                            <td>" + item.email + "</td>\
                                            <td>" + item.phone + "</td>\
                                            <td>" + item.course + "</td>\
                                            <td><img src='images/student/" + item.image + "'width='50px' hight='50px' alt='img'></td>\
                                            <td><button type='button' class='edit_student btn btn-primary btn-sm' value='" +
                                    item.id + " id='edit'>Edit</button>\
                                            <button type='button' class='delete_student btn btn-danger btn-sm'  value='" + item
                                    .id + "'id='delete'>Delete</button></td>\
                                            </tr>");
                                $('tbody').prepend(row);

                            });
                        }
                    });
                    // delete

                    $(document).on('click', '.delete_student', function(e) {
                        e.preventDefault();
                        var stud_id = $(this).val();
                        console.log(stud_id);

                        $('#DeleteStudentId').val(stud_id);
                        $('#DeleteStudentModal').modal('show');
                    });

                    $(document).on('click', '.delete_student_btn', function(e) {
                        e.preventDefault();
                        var stud_id = $('#DeleteStudentId').val();


                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var url = "{{ route('student.delete', '') }}" + '/' + stud_id;
                        $.ajax({
                            type: 'delete',
                            url: url,
                            success: function(response) {
                                console.log(response);
                                $('#DeleteStudentModal').modal("hide");
                                $('#SuccessMessage').addClass('alert alert-success');
                                $('#SuccessMessage').text(response.message);
                                fetchStudent();
                                $('#SuccessMessage').fadeTo(1000, 0.1);
                            }
                        })
                    })

                    // $(document).on('click', '.edit_student', function(e) {
                    //     e.preventDefault();
                    //     var stud_id = $(this).val();
                    //     console.log(stud_id);
                    //     alert('want to edit');
                    //     $('#EditStudentModal').modal('show');

                    // });

                    // insert

                    $(document).on('click', '.add_student', function(e) {
                        e.preventDefault();

                        console.log('add');
                        // var data = {
                        //     'name': $('.name').val(),
                        //     'email': $('.email').val(),
                        //     'phone': $('.phone').val(),
                        //     'course': $('.course').val(),
                        //     'image': $('.image').val(),

                        // }

                        // let formData = new formData($('#form_data')[0]);
                        // console.log(data);

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var data = new FormData(document.getElementById("add_form_data"));
                        var bar = $('.bar');
                        var percent = $('.percent');
                        $.ajax({
                            type: 'POST',
                            url: 'api/student',
                            data: data,
                            dataType: "json",
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                console.log(response);
                                $('#SuccessMessage').addClass('alert alert-success');
                                $('#SuccessMessage').text(response.message);
                                // $('#AddStudentModal').modal('hide');
                                $('#AddStudentModal').find('input').val('');
                                fetchStudent();
                                $('#SuccessMessage').fadeTo(2000, 0);


                            },
                            xhr: function() {
                                var xhr = new window.XMLHttpRequest();
                                xhr.upload.addEventListener("progress", function(evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = (evt.loaded / evt.total) *
                                            100;
                                        // Place upload progress bar visibility code here
                                        $('.upload_pro').html($('.upload_pro').html() +
                                            '-' + percentComplete);
                                        var percentVal = percentComplete + '%';
                                        // alert(percentVal);
                                        $('.bar').width(percentVal);
                                        $('.percent').html(percentVal);
                                    }
                                }, false);
                                return xhr;
                            },
                            beforeSend: function() {
                                var percentVal = '0' + '%';
                                bar.width(percentVal);
                                percent.html(percentVal);
                                // alert(percentVal);
                            },
                            complete: function(xhr) {
                                console.log('File has uploaded');
                            }
                        });
                    });
                }
            })
        </script>

        <script>
            $(document).ready(function() {


                $(document).on('click', '.add_image', function(e) {
                    e.preventDefault();
                    console.log('add');



                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var bar = $('.bar');
                    var percent = $('.percent');
                    var form_data = new FormData(document.getElementById("upload_form"));
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('student.image') }}",
                        data: form_data,
                        dataType: "json",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                            $('#SuccessMessage').addClass('alert alert-success');
                            $('#SuccessMessage').text(response.message);
                            // $('#image_upload').modal('hide');
                            $('#image').val('');
                            // fetchStudent();

                            $('#SuccessMessage').fadeTo(5000, 0);
                        },
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = (evt.loaded / evt.total) * 100;
                                    // Place upload progress bar visibility code here
                                    $('.upload_img').html($('.upload_img').html() + '-' +
                                        percentComplete);;
                                    var percentVal = percentComplete + '%';
                                    // alert(percentVal);
                                    $('.bar').width(percentVal);
                                    $('.percent').html(percentVal);
                                }
                            });
                            return xhr;
                        },
                        beforeSend: function() {
                            var percentVal = '0' + '%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                            // alert(percentVal);
                        },
                        complete: function(xhr) {
                            console.log('File has uploaded');
                        }
                    })


                });




            });
        </script>


        {{-- <script>
            $(document).ready(function() {
                var autocomplete;
                // var id='add_autocomplete';
                autocomplete = new google.maps.places.Autocomplete((document.getElementById('#add_autocomplete')),{
                    type: ['geocode'], }
            })
        </script> --}}

        <script>
            // $('#g_input').find('input').val();
            var autocomplete;

            /* ------------------------- Initialize Autocomplete ------------------------ */
            function initAutocomplete() {
                var input = document.getElementById("placeInput");
                var options = {
                    componentRestrictions: {
                        country: "IN"
                    },
                    fields: ["address_components", "geometry"],
                    types: ["address"],

                }
                autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.addListener("place_changed", onPlaceChange)

            }

            /* --------------------------- Handle Place Change -------------------------- */
            function onPlaceChange() {
                const place = autocomplete.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                var latlng = new google.maps.LatLng(latitude, longitude);
                // alert(latlng);
                var geocoder = geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'latLng': latlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var address = results[0].formatted_address;
                            var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                            var country = results[0].address_components[results[0].address_components.length - 2]
                                .long_name;
                            var state = results[0].address_components[results[0].address_components.length - 3]
                                .long_name;
                            var city = results[0].address_components[results[0].address_components.length - 4]
                                .long_name;
                            var landmark = results[0].address_components[results[0].address_components.length - 5]
                                .long_name;
                            var street = results[0].address_components[results[0].address_components.length - 6]
                                .long_name;
                            var local_area = results[0].address_components[results[0].address_components.length - 7]
                                .long_name;
                            var route = results[0].address_components[results[0].address_components.length - 8]
                                .short_name;
                            document.getElementById('txtCountry').value = country;
                            document.getElementById('txtState').value = state;
                            document.getElementById('txtCity').value = city;
                            document.getElementById('txtZip').value = pin;
                            document.getElementById('name').value = place.name;
                            document.getElementById('landmark').value = landmark;
                            document.getElementById('street').value = street;
                            document.getElementById('local_area').value = local_area;
                            document.getElementById('route').value = route;
                            // document.getElementById('route').value = '';

                        }
                    }
                });
                console.log(place.formatted_address)
                console.log(place.geometry.location.lat())
                console.log(place.geometry.location.lng())
                $('#g_input').find('input').val();

                // document.getElementById('formatted_address').value = place.formatted_address;
                // document.getElementById('cityLat').value = place.geometry.location.lat();
                // document.getElementById('cityLng').value = place.geometry.location.lng();
            }
        </script>

        <script>
            $(document).on('click', '#addr_submit', function(e) {
                e.preventDefault();
                console.log('clicked addrss button')

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data = new FormData(document.getElementById("addr_form"));
                $.ajax({
                    type: 'post',
                    url: "{{ route('student.address') }}",
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        console.log(response);
                        $('#addr_form').find('input').val('');
                    }

                });

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#checkboxesMain').on('click', function(e) {
                    if ($(this).is(':checked', true)) {
                        $(".checkbox").prop('checked', true);
                    } else {
                        $(".checkbox").prop('checked', false);
                    }
                });
                $('.checkbox').on('click', function() {
                    if ($('.checkbox:checked').length == $('.checkbox').length) {
                        $('#checkboxesMain').prop('checked', true);
                    } else {
                        $('#checkboxesMain').prop('checked', false);
                    }
                });
                $('.removeAll').on('click', function(e) {
                    var studentIdArr = [];
                    $(".checkbox:checked").each(function() {
                        studentIdArr.push($(this).attr('data-id'));
                    });
                    if (studentIdArr.length <= 0) {
                        alert("Choose min one item to remove.");
                    } else {
                        if (confirm("Are you sure?")) {
                            var stuId = studentIdArr.join(",");
                            $.ajax({
                                url: "{{ url('delete-all') }}",
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: 'ids=' + stuId,
                                success: function(data) {
                                    if (data['status'] == true) {
                                        $(".checkbox:checked").each(function() {
                                            $(this).parents("tr").remove();
                                        });
                                        alert(data['message']);
                                    } else {
                                        alert('Error occured.');
                                    }
                                },
                                error: function(data) {
                                    alert(data.responseText);
                                }
                            });
                        }
                    }
                });
            });
        </script>


</body>

</html>
