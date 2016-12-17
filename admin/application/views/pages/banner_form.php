<div class="col-md-10 col-xs-10">

    <div class="">
        <a href="" id="a-test6" data-toggle="image" class="img-thumbnail">
            <img id="img-test6" style="max-width: 200px;" src="http://localhost/casarepository/admin/assets\images\No-image-found.jpg" alt="" title="" data-placeholder="รูปสินค้า"></a>

        <input type="file" name="test6" class="img-input" value="0" id="input-image"></div>

    <div class="text-danger"></div>
    <div class="col-md-2 col-xs-2" align="right"></div>

</div>

<script>

    $(document).on("change", ".img-input", function () {
        show_thumbnail(this);
    });

    function show_thumbnail(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-' + input.name).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>