</div>
</div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logiutPopup" tabindex="-1" aria-labelledby="logiutPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="bi bi-x close" data-dismiss="modal" aria-label="Close"></button>
                <div class="contentModal text-center px-md-5">
                    <i class="bi bi-question-circle-fill"></i>
                    <h3>Logout</h3>
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="reset-footer d-flex flex-wrap gap-15 justify-content-center align-items-center">
                    <button type="button" class="btn bg-theme-primary text-white px-5 rounded-pill" onclick="window.location.href = '../login-pages/login.php'" data-dismiss="modal">Yes</button>
                    <button type="button" class="btn bg-theme-primary-outline text-white px-5 rounded-pill" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layouts.scripts')
