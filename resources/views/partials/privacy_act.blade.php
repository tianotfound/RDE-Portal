<div id="privacyActModal" class="modal" tabindex="-1" role="dialog" style="display: block; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Privacy Act</h5>
            </div>
            <div class="modal-body text-center">
                <p>We value your privacy. By continuing to use this website, you agree to our compliance with the Data Privacy Act. Please review our privacy policy for more details.</p>
            </div>
            <div class="modal-footer">
                <button id="acceptPrivacy" class="btn btn-primary">Accept</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('privacyActModal');
        const acceptButton = document.getElementById('acceptPrivacy');

        modal.style.display = 'flex';

        acceptButton.addEventListener('click', function () {
            modal.style.display = 'none';
        });
    });
</script>
