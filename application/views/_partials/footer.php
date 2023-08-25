<div class="container" id="footer">
    <div class="col-md-12 mt-5">
        <div class="mb-4 text-center">
            <p class="custom-text-color-primary footer-text mb-5 mt-3">©2023 - Esa Hadistra
            </p>
        </div>
    </div>
</div>
<a href="#home" class="back_top"><i class="mdi mdi-chevron-up"></i></a>

<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type='text/javascript'>
    const clickCount = (url, extLink, key) => {
        $.ajax({
            url: '<?= base_url() ?>api/redirect-count',
            method: 'post',
            data: {
                "key": key
            },
            dataType: 'json',
            beforeSend: function() {
                extLink ? window.open(url) : window.location.replace('<?= base_url() ?>' + url);
            },
            success: function(res) {
                // if successful
            },
            error: function(xhr) {
                // if error occured
                console.log('Error occured.please try again')
                console.log(xhr.responseText)
            }
        });
    };
</script>
</body>

</html>