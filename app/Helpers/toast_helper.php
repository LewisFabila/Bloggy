<?php

if (!function_exists('alert_toast')) {
    function alert_toast($duration = 6000)
    {
        $session = session();
        $messages = $session->getFlashdata('message');
        $type    = $session->getFlashdata('type') ?? 'success';

        if (!$messages) {
            return '';
        }

        $id = 'toast_' . uniqid();

        $content = is_array($messages)
            ? '<ul class="mb-0">' . implode('', array_map(fn($m) => '<li>' . esc($m) . '</li>', $messages)) . '</ul>'
            : esc($messages);

        return '
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
            <div id="'.$id.'" class="toast align-items-center text-bg-'.$type.' border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        '.$content.'
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