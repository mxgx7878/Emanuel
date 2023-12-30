<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="_csrf" content="${_csrf.token}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

</head>

<body>
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1>Add Product</h1>
            <form action="javascript:void(0)" method="post" enctype="multipart/form-data" id="form_data">
                @csrf
                <div class="form-group">
                    <label>title</label>
                    <input type="text" id="title" name="title" class="form-control" value="test">
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input type="text" id="description" name="description" class="form-control" value="testtest">
                </div>
                <div class="form-group">
                    <label>customize item</label><br>
                    <input type="checkbox" name="customize_item_id[]" value="1">customize_item_id 1 <br>
                    <input type="checkbox" name="customize_item_id[]" value="2">customize_item_id 2 <br>
                    <input type="checkbox" name="customize_item_id[]" value="3">customize_item_id 3 <br>
                </div>
                <div class="form-group">
                    <label>product_images</label>
                    <input type="file" id="product_images" name="product_images[]" class="form-control" multiple>
                </div>
                <button type="submit" id="form_submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

</body>

<script>
    $(document).ready(function() {
        $("#form_data").on('submit', function(e) {
            // alert('checl');
            e.preventDefault();
            console.log($("#title").val());

            // var form_data = $('#form_data');
            // var data = form_data.serialize();
            // const data = new FormData(this);
            // // data.append('title', $("#title").val())
            // for (const value of data.values()) {
            //     console.log(value);
            // }
            // data.append('title', $("#title").val());
            // var input = document.querySelector('input[type=file]');
            // var data = new FormData();
            // for(let i = 0; i < input.files.lenght; i++){
            //     data.append(`file_${i}`, input.files[i]);
            // }

            var array = [];
            var checkboxes = document.querySelectorAll("input[name='customize_item_id[]']:checked")

            for (var i = 0; i < checkboxes.length; i++) {
                array.push(checkboxes[i].value);
            }
            var file = [];
            var getfile = $("#product_images")[0].files;
            console.log(getfile);
            console.log(getfile.length);
            for (var k = 0; k < getfile.length; k++) {
                // file.push(getfile.files[k]);
                console.log(getfile.files[k]);
            }
            var data = {
                name: $("#title").val(),
                description: $("#description").val(),
                customize_item_id: array,
                // customize_item_id: $("input[name='customize_item_id[]']").val(),
                // product_images : $("#product_images")[0].files,
                product_images : file,
            }
            console.log(data);
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            console.log(csrfToken);



            fetch("http://localhost/Food-Stadium/vendor/product_add_update", {
                // body: new FormData(document.getElementById("form_data")),
                method: "POST",
                // body: JSON.stringify(Object.fromEntries(new FormData(document.getElementById("form_data")))),
                headers: {
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },



                body: JSON.stringify({
                    data
                }),

                // Cache: 'default'
            }).then(res => console.log(res))


            // console.log(data)





            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            //     }
            // });
            // $.ajax({
            //     contentType: false,
            //     processData : false,
            //     type: "post",
            //     url: "{{ url('vendor/product_add_update') }}" ,
            //     dataType: 'JSON',
            //     data: data,
            //     success: function(data) {
            //         console.log(data);
            //     }
            // })
        });
    });
</script>

</html>
