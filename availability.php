<?php include 'header.php';?>

<?php include 'banner.html';?>

<link href="css/toastr.min.css" rel="stylesheet" type="text/css" />
<script src="js/toastr.min.js"></script>
<script type="text/javascript">
    $(function () {
        var i = -1;
        var toastCount = 0;
        var $toastlast;
        var getMessage = function () {
	    var tr = $.tr.translator(); 
            var msgs = [
tr("Winter room"),
tr("Spring room"),
tr("Summer room"),
tr("Autumn room")
            ];
            i++;
            if (i === msgs.length) {
                i = 0;
            }

            return msgs[i];
        };

        var getMessageWithClearButton = function (msg) {
            msg = msg ? msg : 'Clear itself?';
            msg += '<br /><br /><button type="button" class="btn clear">Yes</button>';
            return msg;
        };

        $('#showtoast').click(function () {
            var shortCutFunction = "success";
            var msg = $('#message').val();
            var title = $('#title').val() || '';
            var $showDuration = 300;
            var $hideDuration = 1000;
            var $timeOut = 5000;
            var $extendedTimeOut = 1000;
            var $showEasing = "swing";
            var $hideEasing = "linear";
            var $showMethod = "fadeIn";
            var $hideMethod = "fadeOut";
            var toastIndex = toastCount++;
            var addClear = false;

            toastr.options = {
                closeButton: false,
                debug: false,
                newestOnTop: false,
                progressBar: true,
                positionClass: 'toast-top-full-width',
                preventDuplicates: true,
                onclick: null
            };

            if ($('#addBehaviorOnToastClick').prop('checked')) {
                toastr.options.onclick = function () {
                    alert('You can perform some custom action after a toast goes away');
                };
            }

            if (addClear) {
                msg = getMessageWithClearButton(msg);
                toastr.options.tapToDismiss = false;
            }
            if (!msg) {
                msg = getMessage();
            }

            $('#toastrOptions').text('Command: toastr["'
                            + shortCutFunction
                            + '"]("'
                            + msg
                            + (title ? '", "' + title : '')
                            + '")\n\ntoastr.options = '
                            + JSON.stringify(toastr.options, null, 2)
            );

            var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
            $toastlast = $toast;

            if(typeof $toast === 'undefined'){
                return;
            }

            if ($toast.find('#okBtn').length) {
                $toast.delegate('#okBtn', 'click', function () {
                    alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                    $toast.remove();
                });
            }
            if ($toast.find('#surpriseBtn').length) {
                $toast.delegate('#surpriseBtn', 'click', function () {
                    alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                });
            }
            if ($toast.find('.clear').length) {
                $toast.delegate('.clear', 'click', function () {
                    toastr.clear($toast, { force: true });
                });
            }
        });

        function getLastToast(){
            return $toastlast;
        }
        $('#clearlasttoast').click(function () {
            toastr.clear(getLastToast());
        });
        $('#cleartoasts').click(function () {
            toastr.clear();
        });
    })
</script>
<div id="information" class="spacer reserve-info ">
<div class="container">
	<div id='loading'>Laden...</div>
	<h1 class="title" id="availability">Beschikbaarheid</h1>
        <div class="row">
	   <div>
		<div class="col-xs-12 col-sm-12 voffset8">
                   <h3 class="title">Winter kamer</h3>
                   <div id='calendar1'></div>
		</div>
		<div class="col-xs-12 col-sm-12 voffset8">
                   <h3 class="title">Lente kamer</h3>
                   <div id='calendar2'></div>
                </div>
		<div class="col-xs-12 col-sm-12 voffset8">
                   <h3 class="title">Zomer kamer</h3>
                   <div id='calendar3'></div>
                </div>
		<div class="col-xs-12 col-sm-12 voffset8">
                   <h3 class="title">Herfst kamer</h3>
                   <div id='calendar4'></div>
                </div>
	   </div>
	</div>

        <div class="row">
            <button type="button" class="btn btn-primary" id="showtoast">Show Toast</button>
            <button type="button" class="btn btn-danger" id="cleartoasts">Clear Toasts</button>
            <button type="button" class="btn btn-danger" id="clearlasttoast">Clear Last Toast</button>
        </div>
</div>
</div>

<?php include 'footer.php';?>
