<div id="privacyActModal" class="modal" tabindex="-1" role="dialog" style="display: block; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Privacy Act</h5>
            </div>
            <div class="modal-body">
                <p>We value your privacy. By continuing to use this website, you agree to our compliance with the Data Privacy Act. Please review our privacy policy for more details.</p>
            </div>
            <div class="modal-footer">
                <span id="timer" style="margin-right: 10px;">Please wait 3 seconds...</span>
                <button id="acceptPrivacy" class="btn btn-primary" disabled>Accept</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('privacyActModal');
        const acceptButton = document.getElementById('acceptPrivacy');
        const timerSpan = document.getElementById('timer');

        modal.style.display = 'block';

        let countdown = 3;
        const timerInterval = setInterval(() => {
            countdown--;
            if (countdown > 0) {
                timerSpan.textContent = `Please wait ${countdown} seconds...`;
            } else {
                timerSpan.textContent = '';
                acceptButton.disabled = false;
                clearInterval(timerInterval);
            }
        }, 1000);

        acceptButton.addEventListener('click', function () {
            modal.style.display = 'none';
        });
    });
</script>
