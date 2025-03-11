<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
  <div class="card">
    <div class="card-body">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Hand-crafted & made with <i class="typcn typcn-heart-full-outline text-danger"></i></span>
      </div>
    </div>
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/') ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url('assets/') ?>js/off-canvas.js"></script>
<script src="<?= base_url('assets/') ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets/') ?>js/template.js"></script>
<script src="<?= base_url('assets/') ?>js/settings.js"></script>
<script src="<?= base_url('assets/') ?>js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->

<!-- fontawesome -->
<script src="<?= base_url('assets/fontawesome/js/') ?>all.min.js"></script>

<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<!-- DATATABLE -->
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

<script>
  var canvas = document.getElementById('signature-pad');

  // Adjust canvas coordinate space taking into account pixel ratio,
  // to make it look crisp on mobile devices.
  // This also causes canvas to be cleared.
  function resizeCanvas() {
    // When zoomed out to less than 100%, for some very strange reason,
    // some browsers report devicePixelRatio as less than 1
    // and only part of the canvas is cleared then.
    var ratio = Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
  }
  // setTimeout(resizeCanvas, 100);

  window.onload = function() {
    var canvas = document.getElementById('signature-pad');
    if (!canvas) {
      console.error("Canvas not found!");
      return;
    }

    function resizeCanvas() {
      var ratio = Math.max(window.devicePixelRatio || 1, 1);
      canvas.width = canvas.offsetWidth * ratio;
      canvas.height = canvas.offsetHeight * ratio;
      canvas.getContext("2d").scale(ratio, ratio);
    }

    resizeCanvas(); // Ensure it runs once after the page loads
    window.addEventListener("resize", resizeCanvas); // Resize when the window is resized

    var signaturePad = new SignaturePad(canvas, {
      backgroundColor: 'rgb(255, 255, 255)' // Required for JPEG format
    });
  };
  window.onresize = resizeCanvas;
  resizeCanvas();

  var signaturePad = new SignaturePad(canvas, {
    backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
  });

  document.getElementById('save-png').addEventListener('click', function() {
    if (signaturePad.isEmpty()) {
      alert("Tanda Tangan Anda Kosong! Silahkan tanda tangan terlebih dahulu.");
    } else {
      var data = signaturePad.toDataURL('image/png');
      console.log(data);
      $('#tes_signature').find('.disini').html('<h4>Format .PNG</h4><img src="' + data + '"><textarea id="signature64" name="signed" style="display:none">' + data + '</textarea>');
      $('#signed2').val(data);
    }
  });

  document.getElementById('clear').addEventListener('click', function() {
    signaturePad.clear();
  });

  document.getElementById('undo').addEventListener('click', function() {
    var data = signaturePad.toData();
    if (data) {
      data.pop(); // remove the last dot or line
      signaturePad.fromData(data);
    }
  });

  document.getElementById('resize-canvas').addEventListener('click', function() {
    resizeCanvas();
    console.log("Canvas resized!");
  });
</script>

</body>

</html>