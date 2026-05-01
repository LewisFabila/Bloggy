<?php

if (!function_exists('alert_toast')) {
    function alert_toast($duration = 6000)
    {
        $session = session();
        $message = $session->getFlashdata('message');
        $type    = $session->getFlashdata('type') ?? 'success';

        if (!$message) {
            return '';
        }

        $id = 'toast_' . uniqid();

        return '
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
            <div id="'.$id.'" class="toast align-items-center text-bg-'.$type.' border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        '.$message.'
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var toastEl = document.getElementById("'.$id.'");
                if (toastEl) {
                    var toast = new bootstrap.Toast(toastEl, {
                        delay: '.$duration.'
                    });
                    toast.show();
                }
            });
        </script>
        ';
    }
}