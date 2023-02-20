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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
    </script>

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
                            <div class="form-group mb-5">
                                <div class="progress" role="progressbar" aria-label="Basic example"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar "></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="upload" class="btn btn-primary add_image">Upload Image</button>
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
                            <a href="#" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal"
                                data-bs-target="#AddStudentModal">Add Student</a>
                            <a href="#" class="btn btn-info float-end btn-sm" data-bs-toggle="modal"
                                data-bs-target="#image_upload">Upload Image </a>
                        </h4>

                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
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
        </div>
        <div class="container">
            <img src="" id="image">
        </div>

    </div>



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
                            $('tbody').append('<tr>\
                                                                <td>' + item.id + '</td>\
                                                                <td>' + item.name + '</td>\
                                                                <td>' + item.email + '</td>\
                                                                <td>' + item.phone + '</td>\
                                                                <td>' + item.course + '</td>\
                                                                <td><img src="images/student/' + item.image +
                                '" width="50px" hight="50px" alt="img"></td>\
                                                                <td><button type="button" class="edit_student btn btn-primary btn-sm" value="' +
                                item.id +
                                '" id="edit">Edit</button>\
                                                                    <button type="button"class="delete_student btn btn-danger btn-sm"  value="' +
                                item.id + '" id="delete">Delete</button>\
                                                                </td>\
                                                            </tr>');
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






                $(document).on('click', '.edit_student', function(e) {
                    e.preventDefault();
                    var stud_id = $(this).val();
                    console.log(stud_id);
                    alert('want to edit');
                    $('#EditStudentModal').modal('show');

                });








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
                            $('#AddStudentModal').modal('hide');
                            $('#AddStudentModal').find('input').val('');
                            fetchStudent();
                            $('#SuccessMessage').fadeTo(2000, 0);

                            var bar = $('.bar');
                            var percent = $('.percent');

                            $('add_form_data').ajaxForm({
                                beforeSend: function() {
                                    var percentVal = '0%';
                                    bar.width(percentVal);
                                    percent.html(percentVal);
                                },
                                uploadProgress: function(event, position, total,
                                    percentComplete) {
                                    var percentVal = percentComplete + '%';
                                    bar.width(percentVal);
                                    percent.html(percentVal);

                                },
                                complete: function() {
                                    alert('uploded');
                                }

                            })
                        }
                    })

                })


            }








        })
    </script>

    <script>
        $(document).ready(function(){


        $(document).on('click', '.add_image', function(e) {
            e.preventDefault();
            console.log('add');



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
                    $('#image_upload').modal('hide');
                    // $('#image').val('');
                    // fetchStudent();
                    $('#SuccessMessage').fadeTo(5000, 0);
                }
            })

        })
        $(function() {

            $('#upload_form').ajaxForm({
                beforeSend: function() {
                    var percentage = '0';
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentage = percentComplete;
                    $('.progress .progress-bar').css("width", percentage + '%', function() {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    })
                },
                complete: function(xhr) {
                    console.log('File has uploaded');
                }
            });
        });

    })
    </script>



</body>

</html>
