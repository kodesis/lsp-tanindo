</div>
<!-- container-scroller -->
<!-- base:js -->
<script src="<?= base_url('assets/') ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?= base_url('assets/') ?>js/off-canvas.js"></script>
<script src="<?= base_url('assets/') ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets/') ?>js/template.js"></script>
<script src="<?= base_url('assets/') ?>js/settings.js"></script>
<script src="<?= base_url('assets/') ?>js/todolist.js"></script>
<!-- endinject -->

<!-- Configure a few settings and attach camera -->
<?php
$url_cam = $this->uri->segment(2);

if ($url_cam == "regisktna") {
?>
  <script language="JavaScript">
    Webcam.set({
      // width: 260,
      height: 300,
      image_format: 'jpeg',
      jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
      Webcam.snap(function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="' + data_uri + '" height="300" width="auto"/>';
      });
    }
  </script>
<?php
}
?>
<!-- recaptcha -->
<script src="https://www.google.com/recaptcha/api.js"></script>
<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/enterprise.js" async defer></script> -->

</body>

</html>