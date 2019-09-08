 <!-- jQuery -->
<script src="../gent/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../gent/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../gent/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../gent/vendors/nprogress/nprogress.js"></script>
<!-- jQuery Smart Wizard -->
<script src="../gent/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- Custom Theme Scripts -->
<script src="../gent/production/js/custom.js"></script>
<!-- jquery.inputmask -->
<script src="../gent/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- jQuery Tags Input -->
<script src="../gent/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Select2 -->
<script src="../gent/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- PNotify -->
    <script src="../gent/vendors/pnotify/dist/pnotify.js"></script>
    <script src="../gent/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../gent/vendors/pnotify/dist/pnotify.nonblock.js"></script>
<!-- Datatables -->
    <script src="../gent/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../gent/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../gent/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../gent/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../gent/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../gent/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../gent/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
   

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                
                {
                  extend: "print",
                  className: "btn-sm btn-primary"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();
          $('#datatable').dataTable();
        

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->


<!-- jquery.inputmask -->
<script>
  $(document).ready(function() {
    $(":input").inputmask();
  });
</script>
<!-- /jquery.inputmask -->


<!-- jQuery Tags Input -->
<script>
  function onAddTag(tag) {
    alert("Added a tag: " + tag);
  }

  function onRemoveTag(tag) {
    alert("Removed a tag: " + tag);
  }

  function onChangeTag(input, tag) {
    alert("Changed a tag: " + tag);
  }

  $(document).ready(function() {
    $('#tags_1').tagsInput({
      width: 'auto'
    });
  });
</script>
<!-- /jQuery Tags Input -->

<!-- Select2 -->
<script>
  $(document).ready(function() {
    $(".select2_single").select2({
      placeholder: "---Select---",
      allowClear: true
    });
    $(".select2_group").select2({});
    $(".select2_multiple").select2({
      maximumSelectionLength: 15,
      placeholder: "With Max Selection limit 15",
      allowClear: true
    });
  });
</script>
<!-- /Select2 -->


    <!-- Custom Notification -->
    <script>
      $(document).ready(function() {
        var cnt = 10;

        TabbedNotification = function(options) {
          var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title +
            "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

          if (!document.getElementById('custom_notifications')) {
            alert('doesnt exists');
          } else {
            $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
            $('#custom_notifications #notif-group').append(message);
            cnt++;
            CustomTabs(options);
          }
        };

        CustomTabs = function(options) {
          $('.tabbed_notifications > div').hide();
          $('.tabbed_notifications > div:first-of-type').show();
          $('#custom_notifications').removeClass('dsp_none');
          $('.notifications a').click(function(e) {
            e.preventDefault();
            var $this = $(this),
              tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
              others = $this.closest('li').siblings().children('a'),
              target = $this.attr('href');
            others.removeClass('active');
            $this.addClass('active');
            $(tabbed_notifications).children('div').hide();
            $(target).show();
          });
        };

        CustomTabs();

        var tabid = idname = '';

        $(document).on('click', '.notification_close', function(e) {
          idname = $(this).parent().parent().attr("id");
          tabid = idname.substr(-2);
          $('#ntf' + tabid).remove();
          $('#ntlink' + tabid).parent().remove();
          $('.notifications a').first().addClass('active');
          $('#notif-group div').first().css('display', 'block');
        });
      });
    </script>
    <!-- /Custom Notification -->
    <!--txtNumeric-->
<script type="text/javascript">
$(function () {
$('#txtNumeric').keydown(function (e) {
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;
if (!((key == 8)||(key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
e.preventDefault();
}
}
});
});
</script>
<!--txtNumeric-->
<!-- upload image -->
<script type="text/javascript">
$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
};
</script>
<!-- /upload image -->
 <!--txtNumeric-->
<script type="text/javascript">
$(function () {
$('.num').keypress(function (e) {
var key = e.keyCode;
if ((key >= 48 && key <= 57)) {

}
else{e.preventDefault();}

});
});
</script>
<!--txtNumeric-->
<!-- <script language="JavaScript">
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
  }
</script> -->
<script type="text/javascript">
$(function () {
$('.alpha').keypress(function (e) {
var key = e.keyCode;
if  ((key > 64 && key < 91) || (key > 96 && key < 123)) {

}
else{e.preventDefault();}

});
});
</script>
<script type="text/javascript">
$(function () {
$('.alphaNum').keypress(function (e) {
var key = e.keyCode;
if  ((key > 64 && key < 91) || (key > 96 && key < 123)||(key >= 48 && key <= 57)) {

}
else{e.preventDefault();}

});
});
</script>
<script type="text/javascript">
$(function () {
$('.alphaNumHyph').keypress(function (e) {
var key = e.keyCode;
if  ((key > 64 && key < 91) || (key > 96 && key < 123)||(key >= 48 && key <= 57)||(key==45)) {

}
else{e.preventDefault();}

});
});
</script>