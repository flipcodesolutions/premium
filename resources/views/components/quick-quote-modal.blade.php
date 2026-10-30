<!-- =========================================================
     GET QUICK QUOTE POPUP MODAL (EXACT SCREENSHOT MATCH)
========================================================= -->
<div class="modal fade" id="quickQuoteModal" tabindex="-1" aria-labelledby="quickQuoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 520px; margin: 1.75rem auto;">
        <div class="modal-content quick-quote-card">

            {{-- Close Button (Top Right) --}}
            <button type="button" class="quick-quote-close" data-bs-dismiss="modal" aria-label="Close">
                &times;
            </button>

            <div class="modal-body p-0">
                {{-- Modal Header / Title --}}
                <h2 class="quick-quote-heading" id="quickQuoteModalLabel">GET QUICK QUOTE</h2>

                {{-- Alert Notifications --}}
                <div id="modalQuoteSuccess" class="alert alert-success d-none align-items-center gap-2 py-2 px-3 mb-3 border-0" role="alert" style="background-color: #d1e7dd; color: #0f5132; border-radius: 6px;">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <span id="modalQuoteSuccessText">Thank you! Your quote request has been submitted successfully.</span>
                </div>

                <div id="modalQuoteError" class="alert alert-danger d-none align-items-center gap-2 py-2 px-3 mb-3 border-0" role="alert" style="background-color: #f8d7da; color: #842029; border-radius: 6px;">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    <span id="modalQuoteErrorText">Please fill in all required fields.</span>
                </div>

                <form id="quickQuoteModalForm" action="{{ route('quote.store') }}" method="POST" novalidate>
                    @csrf

                    {{-- Row 1: Name & Phone --}}
                    <div class="row g-2 mb-2">
                        <div class="col-6">
                            <input type="text"
                                   name="name"
                                   id="modal_quote_name"
                                   class="form-control qq-input"
                                   placeholder="Name"
                                   required>
                        </div>
                        <div class="col-6">
                            <input type="tel"
                                   name="phone"
                                   id="modal_quote_phone"
                                   class="form-control qq-input"
                                   placeholder="Phone"
                                   required>
                        </div>
                    </div>

                    {{-- Row 2: Email & Address --}}
                    <div class="row g-2 mb-2">
                        <div class="col-6">
                            <input type="email"
                                   name="email"
                                   id="modal_quote_email"
                                   class="form-control qq-input"
                                   placeholder="Email"
                                   required>
                        </div>
                        <div class="col-6">
                            <input type="text"
                                   name="property_address"
                                   id="modal_quote_address"
                                   class="form-control qq-input"
                                   placeholder="Address">
                        </div>
                    </div>

                    {{-- Row 3: Select Service --}}
                    <div class="mb-2">
                        <select name="service_type" id="modal_quote_service" class="form-select qq-input qq-select">
                            <option value="" disabled selected>Select Service</option>
                            <option value="Pre-Purchase Building & Pest Inspection">Pre-Purchase Building &amp; Pest Inspection</option>
                            <option value="Building Stage By Stage Inspection">Building Stage By Stage Inspection</option>
                            <option value="Pool Barrier Inspection">Pool Barrier Inspection</option>
                            <option value="Apartment Building Inspection">Apartment Building Inspection</option>
                            <option value="Rising Damp Inspection">Rising Damp Inspection</option>
                            <option value="Dilapidation Inspection">Dilapidation Inspection</option>
                            <option value="New Build Handover Inspection">New Build Handover Inspection</option>
                            <option value="Vendor Inspection">Vendor Inspection</option>
                            <option value="Builders Warranty Inspection">Builders Warranty Inspection</option>
                        </select>
                    </div>

                    {{-- Row 4: Inspection Date --}}
                    <div class="mb-2">
                        <input type="text"
                               name="inspection_date"
                               id="modal_quote_date"
                               class="form-control qq-input"
                               placeholder="Inspection Date"
                               onfocus="(this.type='date')"
                               onblur="if(!this.value)this.type='text'">
                    </div>

                    {{-- Row 5: Message --}}
                    <div class="mb-3">
                        <textarea name="message"
                                  id="modal_quote_message"
                                  class="form-control qq-input qq-textarea"
                                  rows="4"
                                  placeholder="Message"></textarea>
                    </div>

                    {{-- Row 6: Submit Button --}}
                    <div>
                        <button type="submit" id="btnSubmitModalQuote" class="btn qq-submit-btn w-100">
                            Get My Quote
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<style>
/* =========================================================
   EXACT SCREENSHOT MODAL STYLING
========================================================= */
#quickQuoteModal .modal-backdrop {
    background-color: #061c36 !important;
}

.quick-quote-card {
    background: #ffffff !important;
    border-radius: 4px !important;
    border: none !important;
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.35) !important;
    padding: 38px 30px 30px 30px !important;
    position: relative !important;
}

.quick-quote-close {
    position: absolute;
    top: 14px;
    right: 18px;
    background: transparent;
    border: none;
    font-size: 24px;
    font-family: Arial, sans-serif;
    font-weight: 400;
    line-height: 1;
    color: #1e293b;
    opacity: 0.8;
    cursor: pointer;
    transition: opacity 0.15s ease, transform 0.15s ease;
    padding: 4px;
    z-index: 10;
}

.quick-quote-close:hover {
    opacity: 1;
    transform: scale(1.1);
}

.quick-quote-heading {
    font-family: 'Oswald', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    font-size: 2.75rem !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    color: #072B52 !important;
    text-align: center !important;
    letter-spacing: 0.5px !important;
    margin-top: 0 !important;
    margin-bottom: 24px !important;
    line-height: 1.05 !important;
}

.qq-input {
    background-color: #EEF3F8 !important;
    border: none !important;
    border-radius: 4px !important;
    padding: 0 16px !important;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    font-size: 15px !important;
    color: #1e293b !important;
    height: 48px !important;
    box-shadow: none !important;
    transition: background-color 0.2s ease, box-shadow 0.2s ease !important;
}

.qq-input::placeholder {
    color: #748398 !important;
    font-weight: 400 !important;
    opacity: 1 !important;
}

.qq-input:focus {
    background-color: #EEF3F8 !important;
    outline: 2px solid #48A900 !important;
    box-shadow: none !important;
}

.qq-select {
    color: #1e293b !important;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='%23111827' d='M4.5 6L8 10L11.5 6H4.5Z'/%3e%3c/svg%3e") !important;
    background-repeat: no-repeat !important;
    background-position: right 16px center !important;
    background-size: 14px 14px !important;
    padding-right: 36px !important;
    cursor: pointer;
}

.qq-textarea {
    height: 120px !important;
    padding-top: 14px !important;
    padding-bottom: 14px !important;
    resize: vertical;
}

.qq-submit-btn {
    background-color: #48A900 !important;
    color: #ffffff !important;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    font-weight: 700 !important;
    font-size: 16px !important;
    border-radius: 4px !important;
    border: none !important;
    height: 48px !important;
    padding: 0 20px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-shadow: none !important;
    transition: background-color 0.2s ease, transform 0.15s ease !important;
    cursor: pointer;
}

.qq-submit-btn:hover {
    background-color: #3d8f00 !important;
    color: #ffffff !important;
}

.qq-submit-btn:disabled {
    background-color: #77b848 !important;
    cursor: not-allowed;
}

@media (max-width: 576px) {
    .quick-quote-card {
        padding: 28px 20px 24px 20px !important;
        border-radius: 4px !important;
    }
    .quick-quote-heading {
        font-size: 2.2rem !important;
        margin-bottom: 18px !important;
    }
    .qq-input {
        height: 44px !important;
        font-size: 14px !important;
    }
    .qq-submit-btn {
        height: 44px !important;
        font-size: 15px !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('quickQuoteModalForm');
    const submitBtn = document.getElementById('btnSubmitModalQuote');
    const successAlert = document.getElementById('modalQuoteSuccess');
    const successText = document.getElementById('modalQuoteSuccessText');
    const errorAlert = document.getElementById('modalQuoteError');
    const errorText = document.getElementById('modalQuoteErrorText');
    const modalEl = document.getElementById('quickQuoteModal');

    // Global listener so any floating quote button or estimate button reliably triggers modal
    document.addEventListener('click', function (e) {
        const trigger = e.target.closest('.floating-quote, .estimate-btn, [data-bs-target="#quickQuoteModal"], [data-bs-target="#quickQuoteOffcanvas"]');
        if (trigger) {
            e.preventDefault();
            if (modalEl && typeof bootstrap !== 'undefined') {
                const bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
                bsModal.show();
            }
        }
    });

    if (!form) return;

    if (modalEl) {
        modalEl.addEventListener('show.bs.modal', function () {
            hideAlerts();
        });
    }

    function hideAlerts() {
        if (successAlert) successAlert.classList.add('d-none');
        if (errorAlert) errorAlert.classList.add('d-none');
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        hideAlerts();

        const nameInput = document.getElementById('modal_quote_name');
        const phoneInput = document.getElementById('modal_quote_phone');
        const emailInput = document.getElementById('modal_quote_email');

        if (!nameInput.value.trim()) {
            showError('Please enter your name.');
            nameInput.focus();
            return;
        }

        if (!phoneInput.value.trim()) {
            showError('Please enter your phone number.');
            phoneInput.focus();
            return;
        }

        if (!emailInput.value.trim()) {
            showError('Please enter your email address.');
            emailInput.focus();
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value.trim())) {
            showError('Please enter a valid email address.');
            emailInput.focus();
            return;
        }

        const originalBtnText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Submitting...';

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(errData => {
                    throw errData;
                });
            }
            return response.json();
        })
        .then(data => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;

            if (successAlert) {
                successAlert.classList.remove('d-none');
                successAlert.classList.add('d-flex');
                if (data.message && successText) {
                    successText.textContent = data.message;
                }
            }

            form.reset();

            // Auto-close modal after 2.5 seconds
            setTimeout(function () {
                if (modalEl && typeof bootstrap !== 'undefined') {
                    const bsModal = bootstrap.Modal.getInstance(modalEl);
                    if (bsModal) {
                        bsModal.hide();
                    }
                }
            }, 2500);
        })
        .catch(error => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;

            let msg = 'Your submission failed because of an error. Please try again.';
            if (error && error.errors) {
                const firstKey = Object.keys(error.errors)[0];
                if (firstKey && error.errors[firstKey][0]) {
                    msg = error.errors[firstKey][0];
                }
            } else if (error && error.message) {
                msg = error.message;
            }

            showError(msg);
        });
    });

    function showError(msg) {
        if (errorAlert) {
            errorAlert.classList.remove('d-none');
            errorAlert.classList.add('d-flex');
            if (errorText) errorText.textContent = msg;
        }
    }
});
</script>
