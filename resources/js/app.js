// Import jQuery FIRST and make it globally available
import $ from 'jquery';
window.jQuery = window.$ = $;

// Import bootstrap after jQuery is available
import "./bootstrap";
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import sort from '@alpinejs/sort'
window.Livewire = Livewire
window.Alpine = Alpine
Alpine.plugin(sort)
Livewire.start()

// Import Select2 as a jQuery plugin (no default export)
import 'select2';
import Sortable from "sortablejs";
import moment from 'moment';
import intlTelInput from "intl-tel-input";
import nProgress from "nprogress";
import Toastify from 'toastify-js'
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import { jsPDF } from "jspdf";


window.intlTelInput = intlTelInput;
window.NProgress = nProgress;
window.moment = moment;
window.Toastify = Toastify;
window.Calendar = Calendar
window.dayGridPlugin = dayGridPlugin
window.timeGridPlugin = timeGridPlugin
window.listPlugin = listPlugin
window.Sortable = Sortable
window.jsPDF = jsPDF;
const AppAssets = import.meta.glob([
    '../assets/fonts/**',
    '../assets/img/**',
    '../assets/css/**',
    '../assets/js/**',
    '../assets/plugins/**/**',
])
console.log(AppAssets);
$(document).on("click", ".deleteBtn", function () {
    let title = $(this).data("title");
    let url = $(this).data("route");
    let question = $(this).data("question");
    var id = $(this).data("id");
    if (id != "" && url != "") {
        $("#GeneralDeleteModal .input[name='id']").val(id);
        $("#GeneralDeleteModal form").attr("action", url);
        $("#GeneralDeleteModal .modal_title").html(title);
        $("#GeneralDeleteModal .modal_message").html(question);
        $("#GeneralDeleteModal").modal("show");
    }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', 'a[data-ajax-modal="true"], button[data-ajax-modal="true"], div[data-ajax-modal="true"], span[data-ajax-modal="true"]', function () {
    let title = $(this).data("title");
    let style = $(this).data("style");
    let size = $(this).data("size");
    let url = $(this).data('url');
    $.ajax({
        url: url,
        beforeSend: function () {
            $("#loader-wrapper").addClass("d-block");
        },
        success: function (data) {
            if (!$("#generalModalPopup").length) {
                $("body").append(
                    $(
                        `<div class="modal custom-modal ${
                            style ? style : "fade"
                        }" id="generalModalPopup" role="dialog">
                            <div class="modal-dialog modal-dialog-centered ${
                                size ? "modal-" + size : ""
                            }" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        ${
                                            title
                                                ? '<h5 class="modal-title">' +
                                                    title +
                                                    "</h5>"
                                                : ""
                                        }
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="body"></div>
                                </div>
                            </div>
                        </div>`
                    )
                );
            }
            $("#generalModalPopup .body").html(data);
            $("#generalModalPopup").modal("show");
            $("#loader-wrapper").removeClass("d-block");
            if ($(".select").length > 0) {
                $(".select").each(function () {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>');
                    $this.select2({
                      dropdownAutoWidth: true,
                      width: '100%',
                      dropdownParent: $this.parent()
                    });
                });
            }
            if ($(".datepicker").length > 0) {
                $(".datepicker").each(function () {
                    $(this).datetimepicker({
                        format: "YYYY-MM-DD",
                        icons: {
                            up: "fa fa-angle-up",
                            down: "fa fa-angle-down",
                            next: "fa fa-angle-right",
                            previous: "fa fa-angle-left",
                        },
                    });
                });
            }
            if ($(".datetimepicker").length > 0) {
                $(".datetimepicker").each(function () {
                    $(this).datetimepicker({
                        format: "YYYY-MM-DD H:i",
                        icons: {
                            up: "fa fa-angle-up",
                            down: "fa fa-angle-down",
                            next: "fa fa-angle-right",
                            previous: "fa fa-angle-left",
                        },
                    });
                });
            }
        },
        error: function (xhr) {
            $(".loader-wrapper").addClass('d-none');
            console.log(xhr);
            alert("something went wrong")
        }
    });
});

// Submit forms inside general modal via AJAX so the modal stays open on validation errors
$(document).on('submit', '#generalModalPopup form', function (e) {
    e.preventDefault();

    const $form = $(this);
    const url = $form.attr('action');
    const method = ($form.attr('method') || 'POST').toUpperCase();
    const formData = new FormData(this);

    // Clear previous errors
    $form.find('.is-invalid').removeClass('is-invalid');
    $form.find('.invalid-feedback').remove();

    // Disable submit button to prevent double submits
    const $submitBtn = $form.find('[type="submit"]:enabled').first();
    const originalText = $submitBtn.text();
    $submitBtn.prop('disabled', true).addClass('disabled');

    $.ajax({
        url,
        method,
        data: formData,
        processData: false,
        contentType: false,
        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        success: function () {
            // Close modal and refresh any active datatable
            $('#generalModalPopup').modal('hide');

            if ($.fn.DataTable) {
                $('.dataTable').each(function () {
                    const instance = $(this).DataTable();
                    if (instance && instance.ajax) {
                        instance.ajax.reload(null, false);
                    }
                });
            }

            if (window.Toastify) {
                Toastify({ text: 'Saved successfully', gravity: 'top', position: 'right', backgroundColor: '#22c55e' }).showToast();
            }
        },
        error: function (xhr) {
            // Validation errors
            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                const errors = xhr.responseJSON.errors;
                let firstInvalidField = null;

                Object.keys(errors).forEach(function (name) {
                    const messages = errors[name];
                    // Support names like field, field[] and field.0
                    const base = name.replace(/\.[0-9]+$/, '');
                    let $field = $form.find(`[name="${base}"]`);
                    if ($field.length === 0) {
                        $field = $form.find(`[name^="${base}"]`).first();
                    }

                    if ($field.length) {
                        $field.addClass('is-invalid');
                        const $container = $field.closest('.position-relative').length ? $field.closest('.position-relative') : $field;
                        $container.after(`<div class="invalid-feedback" style="display:block;"><i class="bi bi-exclamation-circle me-1"></i>${messages[0]}</div>`);
                        if (!firstInvalidField) firstInvalidField = $field;
                    }
                });

                if (firstInvalidField && firstInvalidField.length) {
                    firstInvalidField[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalidField.focus();
                }
            } else {
                // Other errors
                if (window.Toastify) {
                    Toastify({ text: 'Something went wrong. Please try again.', gravity: 'top', position: 'right', backgroundColor: '#ef4444' }).showToast();
                } else {
                    alert('Something went wrong.');
                }
            }
        },
        complete: function () {
            $submitBtn.prop('disabled', false).removeClass('disabled').text(originalText);
        }
    });
});

// Clear field error when user starts fixing input
$(document).on('input change', '#generalModalPopup .is-invalid', function () {
    $(this).removeClass('is-invalid');
    const $next = $(this).next('.invalid-feedback');
    if ($next.length) $next.remove();
});

if ($(".datetimepicker").length > 0) {
    $(".datetimepicker").each(function () {
        $(this).datetimepicker({
            format: "YYYY-MM-DD H:i",
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: "fa fa-angle-right",
                previous: "fa fa-angle-left",
            },
        });
    });
}
