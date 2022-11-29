jQuery(document).ready(function ($) {
	'use strict';

	// Dashboard Tabs
	$('.spc-dashboard-tabs li.spc-tab-btn a').on('click', function (e) {
		e.preventDefault();
		$('.spc-dashboard-tabs li.spc-tab-btn a').removeClass('active');
		$(this).addClass('active');
		var tab = $(this).attr('href');
		$('.spc-dashboard-tab').removeClass('active');
		$('.spc-dashboard-tabs-wrapper').find(tab).addClass('active');
		$(".spc-dashboard-tabs .active-switcher").css('width', $(this).width() + 62);
		$(".spc-dashboard-tabs .active-switcher").css('left', $(this).position().left);
		console.log($(this).width() + 62);
	});

	// Save Button reacting on any changes
	var saveHeaderAction = $('.spc-dashboard-header-wrapper .spc-btn');
	$('.spc-dashboard-tab input, .spc-dashboard-tab button').on('click', function () {
		saveHeaderAction.addClass('spc-save-now');
		saveHeaderAction.removeAttr('disabled').css('cursor', 'pointer');
	});

	// Saving Data With Ajax Request
	$('.spc-js-element-save-setting').on('click', function (e) {
		e.preventDefault();
		var $this = $(this);
		if ($(this).hasClass('spc-save-now')) {
			$.ajax({
				url: js_spc_settings.ajaxurl,
				type: 'post',
				data: {
					action: 'spc_ajax_save_elements_setting',
					security: js_spc_settings.ajax_nonce,
					fields: $('#spc-elements-settings').serialize(),
				},
				beforeSend: function () {
					$this.html('<svg id="spc-spinner" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><circle cx="24" cy="4" r="4" fill="#fff"/><circle cx="12.19" cy="7.86" r="3.7" fill="#fffbf2"/><circle cx="5.02" cy="17.68" r="3.4" fill="#fef7e4"/><circle cx="5.02" cy="30.32" r="3.1" fill="#fef3d7"/><circle cx="12.19" cy="40.14" r="2.8" fill="#feefc9"/><circle cx="24" cy="44" r="2.5" fill="#feebbc"/><circle cx="35.81" cy="40.14" r="2.2" fill="#fde7af"/><circle cx="42.98" cy="30.32" r="1.9" fill="#fde3a1"/><circle cx="42.98" cy="17.68" r="1.6" fill="#fddf94"/><circle cx="35.81" cy="7.86" r="1.3" fill="#fcdb86"/></svg><span>Saving Data..</span>');
				},
				success: function (response) {

					$this.html('Save Settings');
					$('.spc-dashboard-header-right').prepend('<span class="spc-settings-saved">Settings Saved</span>').fadeIn('slow');

					saveHeaderAction.removeClass('spc-save-now');

					setTimeout(function () {
						$('.spc-settings-saved').fadeOut('slow');
					}, 2000);

				},
				error: function () {

				}
			});
		} else {
			$(this).attr('disabled', 'true').css('cursor', 'not-allowed');
		}
	});

	// add class for change input:check

	var inputCheck = $('.spc-dashboard-checkbox.active .spc-dashboard-checkbox-label input');
	$.each(inputCheck, function () {
		if ($(this).prop("checked")) {
			$(this).closest(".spc-dashboard-checkbox.active").addClass("selected");
		}
	});
	$(inputCheck).change(function () {
		if ($(this).is(":checked")) {
			$(this).closest(".spc-dashboard-checkbox.active").addClass("selected");
		} else {
			$(this).closest(".spc-dashboard-checkbox.active").removeClass("selected");
		}
	});

	$('.spc-element-enable').click(function (e) {
		e.preventDefault();
		$(inputCheck).each(function () {
			var checkBoxActive = $(this).closest(".spc-dashboard-checkbox.active");
			if (checkBoxActive.css('display') == 'flex') {
				checkBoxActive.addClass("selected");
				$(this).prop('checked', true).change();
			}
		});
		saveHeaderAction.addClass('spc-save-now');
	});

	$('.spc-element-disable').click(function (e) {
		e.preventDefault();
		$(inputCheck).each(function () {
			var checkBoxActive = $(this).closest(".spc-dashboard-checkbox.active")
			if (checkBoxActive.css('display') == 'flex') {
				checkBoxActive.remove("selected");
				$(this).prop('checked', false).change();
			}
		});
		saveHeaderAction.addClass('spc-save-now');
	});

	// Search Filter
	var inputSearch = $('#spc-element-filter-search-input');
	var searchResult = $('.spc-dashboard-checkbox-container .spc-dashboard-checkbox');
	$(inputSearch).on("keyup", function () {
		var value = $(this).val().toLowerCase();
		$(searchResult).filter(function () {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});

	$('#exed-element-filter-dropdown-option').niceSelect();

	//Filter Select Option
	$('select#exed-element-filter-dropdown-option').change(function () {
		var filter = $(this).val();
		filterList(filter);
	});

	// Select filter function
	function filterList(value) {
		var list = $(".spc-dashboard-checkbox-container .spc-dashboard-checkbox");
		$(list).hide();
		if (value == "all") {
			$(".spc-dashboard-checkbox-container").find(".spc-dashboard-checkbox").each(function (i) {
				$(this).show();
			});
		} else {
			$(".spc-dashboard-checkbox-container").find(".spc-dashboard-checkbox[data-tag*=" + value + "]").each(function (i) {
				$(this).show();
			});
		}
	}

	// Popup Message

	var popup = $('.spc-dashboard-checkbox-container').find('.spc-dashboard-checkbox.pro .spc-dashboard-checkbox-label');
	popup.click(function () {
		$('.spc-dashboard-popup-message').addClass('popup-active');
		$('.spc-dashboard-popup-overlay').addClass('popup-active');
		setTimeout(function () {
			$('.spc-dashboard-popup-message').removeClass('popup-active');
			$('.spc-dashboard-popup-overlay').removeClass('popup-active');
		}, 8000);
	});

	$('.spc-dashboard-popup-overlay').click(function () {
		$('.spc-dashboard-popup-message').removeClass('popup-active');
		$('.spc-dashboard-popup-overlay').removeClass('popup-active');
	});

});

/*  jQuery Nice Select - v1.1.0
	https://github.com/hernansartorio/jquery-nice-select
	Made by Hernán Sartorio  */

(function ($) {

	$.fn.niceSelect = function (method) {

		// Methods
		if (typeof method == 'string') {
			if (method == 'update') {
				this.each(function () {
					var $select = $(this);
					var $dropdown = $(this).next('.nice-select');
					var open = $dropdown.hasClass('open');

					if ($dropdown.length) {
						$dropdown.remove();
						create_nice_select($select);

						if (open) {
							$select.next().trigger('click');
						}
					}
				});
			} else if (method == 'destroy') {
				this.each(function () {
					var $select = $(this);
					var $dropdown = $(this).next('.nice-select');

					if ($dropdown.length) {
						$dropdown.remove();
						$select.css('display', '');
					}
				});
				if ($('.nice-select').length == 0) {
					$(document).off('.nice_select');
				}
			} else {
				console.log('Method "' + method + '" does not exist.')
			}
			return this;
		}

		// Hide native select
		this.hide();

		// Create custom markup
		this.each(function () {
			var $select = $(this);

			if (!$select.next().hasClass('nice-select')) {
				create_nice_select($select);
			}
		});

		function create_nice_select($select) {
			$select.after($('<div></div>')
				.addClass('nice-select')
				.addClass($select.attr('class') || '')
				.addClass($select.attr('disabled') ? 'disabled' : '')
				.attr('tabindex', $select.attr('disabled') ? null : '0')
				.html('<span class="current"></span><ul class="list"></ul>')
			);

			var $dropdown = $select.next();
			var $options = $select.find('option');
			var $selected = $select.find('option:selected');

			$dropdown.find('.current').html($selected.data('display') || $selected.text());

			$options.each(function (i) {
				var $option = $(this);
				var display = $option.data('display');

				$dropdown.find('ul').append($('<li></li>')
					.attr('data-value', $option.val())
					.attr('data-display', (display || null))
					.addClass('option' +
						($option.is(':selected') ? ' selected' : '') +
						($option.is(':disabled') ? ' disabled' : ''))
					.html($option.text())
				);
			});
		}

		/* Event listeners */

		// Unbind existing events in case that the plugin has been initialized before
		$(document).off('.nice_select');

		// Open/close
		$(document).on('click.nice_select', '.nice-select', function (event) {
			var $dropdown = $(this);

			$('.nice-select').not($dropdown).removeClass('open');
			$dropdown.toggleClass('open');

			if ($dropdown.hasClass('open')) {
				$dropdown.find('.option');
				$dropdown.find('.focus').removeClass('focus');
				$dropdown.find('.selected').addClass('focus');
			} else {
				$dropdown.focus();
			}
		});

		// Close when clicking outside
		$(document).on('click.nice_select', function (event) {
			if ($(event.target).closest('.nice-select').length === 0) {
				$('.nice-select').removeClass('open').find('.option');
			}
		});

		// Option click
		$(document).on('click.nice_select', '.nice-select .option:not(.disabled)', function (event) {
			var $option = $(this);
			var $dropdown = $option.closest('.nice-select');

			$dropdown.find('.selected').removeClass('selected');
			$option.addClass('selected');

			var text = $option.data('display') || $option.text();
			$dropdown.find('.current').text(text);

			$dropdown.prev('select').val($option.data('value')).trigger('change');
		});

		// Keyboard events
		$(document).on('keydown.nice_select', '.nice-select', function (event) {
			var $dropdown = $(this);
			var $focused_option = $($dropdown.find('.focus') || $dropdown.find('.list .option.selected'));

			// Space or Enter
			if (event.keyCode == 32 || event.keyCode == 13) {
				if ($dropdown.hasClass('open')) {
					$focused_option.trigger('click');
				} else {
					$dropdown.trigger('click');
				}
				return false;
				// Down
			} else if (event.keyCode == 40) {
				if (!$dropdown.hasClass('open')) {
					$dropdown.trigger('click');
				} else {
					var $next = $focused_option.nextAll('.option:not(.disabled)').first();
					if ($next.length > 0) {
						$dropdown.find('.focus').removeClass('focus');
						$next.addClass('focus');
					}
				}
				return false;
				// Up
			} else if (event.keyCode == 38) {
				if (!$dropdown.hasClass('open')) {
					$dropdown.trigger('click');
				} else {
					var $prev = $focused_option.prevAll('.option:not(.disabled)').first();
					if ($prev.length > 0) {
						$dropdown.find('.focus').removeClass('focus');
						$prev.addClass('focus');
					}
				}
				return false;
				// Esc
			} else if (event.keyCode == 27) {
				if ($dropdown.hasClass('open')) {
					$dropdown.trigger('click');
				}
				// Tab
			} else if (event.keyCode == 9) {
				if ($dropdown.hasClass('open')) {
					return false;
				}
			}
		});

		// Detect CSS pointer-events support, for IE <= 10. From Modernizr.
		var style = document.createElement('a').style;
		style.cssText = 'pointer-events:auto';
		if (style.pointerEvents !== 'auto') {
			$('html').addClass('no-csspointerevents');
		}

		return this;

	};

}(jQuery));
