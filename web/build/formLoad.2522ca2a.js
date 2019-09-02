(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["formLoad"],{

/***/ "./app/Resources/assets/js/formLoad.js":
/*!*********************************************!*\
  !*** ./app/Resources/assets/js/formLoad.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function Reveal(size, origin) {
  var el = document.createElement('div');
  el.className = "reveal " + size;
  el.setAttribute("data-reveal", "");
  el.setAttribute("role", "dialog");
  el.setAttribute("data-options", "closeOnClick:false;");
  el.revealobject = this;
  el.innerHTML = '';
  this.origin = origin;
  this.el = document.body.appendChild(el);
  eventListeners(this.el);
  $(this.el).on('closed.zf.reveal', function (event, large) {
    $(this).closest('div.reveal-overlay').remove();
    return false;
  });
  $(this.el).on('closeme.zf.reveal', function (event, large) {
    return false;
  });
}

function eventListeners(scope) {
  scope = scope || document;
  var dateFormat = 'dd-mm-yy';
  var datepickerSettings = {
    dateFormat: dateFormat,
    showWeek: true,
    numberOfMonths: 1,
    prevText: ' ',
    nextText: ' ',
    weekHeader: ' ',
    firstDay: 1,
    dayNames: ['Zondag', 'Mandaag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag'],
    dayNamesMin: ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'],
    monthNames: ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'],
    monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
    beforeShow: function beforeShow(input, inst) {
      $('#ui-datepicker-div').addClass('standalone-datepicker');
    }
  }; // $('.datepicker', scope).datepicker(datepickerSettings);
  // $(".datepickerfrom", scope).datepicker(datepickerSettings)
  //     .on( "change", function() {
  //         $('#' + this.id.slice(0, -4) + 'till').datepicker( "option", "minDate", getDate( this ) )
  //     } )
  // $(".datepickertill", scope).datepicker(datepickerSettings)
  //     .on( "change", function() {
  //         $('#' + this.id.slice(0, -4) + 'from').datepicker( "option", "maxDate", getDate( this ) )
  //     } )
  // function getDate( element ) {
  //     try {
  //         return $.datepicker.parseDate( dateFormat, element.value );
  //     } catch( error ) {
  //         return null;
  //     }
  // }
  // $(scope, '.priceCalc').on('change', function(e) {
  //     calculateInvoicePrice(e.target);
  // });
  // $('.select2entity').select2entity();
  // $('.submit-reveal').on('click', function(e) {
  //     e.preventDefault();
  //     $(this).closest('form').submit();
  //     $(this).closest('div.reveal-overlay').remove();
  // });
}

window.Reveal = Reveal;
$(document).ready(function () {
  var pathTouchMoved = false;
  $('body').on('click touchend', '[data-path]', function (e) {
    if (pathTouchMoved != true) {
      e.preventDefault();
      $(this).disabled = true;
      var path = $(this).attr("data-path"); //if (path[0] !== '/')
      //    Routing.generate(path);
      //console.log(path);

      var size = $(this).attr("data-reveal-size");
      var origin = this;
      var reveal = new Reveal(size ? size : 'large', origin);
      var elementToOpen = $(this).attr("data-open-element");
      $.ajax({
        type: 'GET',
        url: path,
        success: function success(data) {
          $(reveal.el).foundation();
          $(reveal.el).html(data).foundation('open');
          $('> div', reveal.el).foundation();
          changeFormResult();
          eventListeners();

          if (elementToOpen) {
            $(elementToOpen).select2('open');
          } else {
            // focus first visible field in form
            $('form').find('*').filter(':input:visible:first').focus();
          }
        }
      });
    }
  }).on('touchmove', function (e) {
    pathTouchMoved = true;
  }).on('touchstart', function () {
    pathTouchMoved = false;
  });
});
console.log("formLoad loaded");

/***/ }),

/***/ 0:
/*!***************************************************!*\
  !*** multi ./app/Resources/assets/js/formLoad.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! ./app/Resources/assets/js/formLoad.js */"./app/Resources/assets/js/formLoad.js");


/***/ })

},[[0,"runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hcHAvUmVzb3VyY2VzL2Fzc2V0cy9qcy9mb3JtTG9hZC5qcyJdLCJuYW1lcyI6WyJSZXZlYWwiLCJzaXplIiwib3JpZ2luIiwiZWwiLCJkb2N1bWVudCIsImNyZWF0ZUVsZW1lbnQiLCJjbGFzc05hbWUiLCJzZXRBdHRyaWJ1dGUiLCJyZXZlYWxvYmplY3QiLCJpbm5lckhUTUwiLCJib2R5IiwiYXBwZW5kQ2hpbGQiLCJldmVudExpc3RlbmVycyIsIiQiLCJvbiIsImV2ZW50IiwibGFyZ2UiLCJjbG9zZXN0IiwicmVtb3ZlIiwic2NvcGUiLCJkYXRlRm9ybWF0IiwiZGF0ZXBpY2tlclNldHRpbmdzIiwic2hvd1dlZWsiLCJudW1iZXJPZk1vbnRocyIsInByZXZUZXh0IiwibmV4dFRleHQiLCJ3ZWVrSGVhZGVyIiwiZmlyc3REYXkiLCJkYXlOYW1lcyIsImRheU5hbWVzTWluIiwibW9udGhOYW1lcyIsIm1vbnRoTmFtZXNTaG9ydCIsImJlZm9yZVNob3ciLCJpbnB1dCIsImluc3QiLCJhZGRDbGFzcyIsIndpbmRvdyIsInJlYWR5IiwicGF0aFRvdWNoTW92ZWQiLCJlIiwicHJldmVudERlZmF1bHQiLCJkaXNhYmxlZCIsInBhdGgiLCJhdHRyIiwicmV2ZWFsIiwiZWxlbWVudFRvT3BlbiIsImFqYXgiLCJ0eXBlIiwidXJsIiwic3VjY2VzcyIsImRhdGEiLCJmb3VuZGF0aW9uIiwiaHRtbCIsImNoYW5nZUZvcm1SZXN1bHQiLCJzZWxlY3QyIiwiZmluZCIsImZpbHRlciIsImZvY3VzIiwiY29uc29sZSIsImxvZyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUEsU0FBU0EsTUFBVCxDQUFnQkMsSUFBaEIsRUFBc0JDLE1BQXRCLEVBQThCO0FBQzFCLE1BQUlDLEVBQUUsR0FBR0MsUUFBUSxDQUFDQyxhQUFULENBQXVCLEtBQXZCLENBQVQ7QUFDQUYsSUFBRSxDQUFDRyxTQUFILEdBQWUsWUFBWUwsSUFBM0I7QUFDQUUsSUFBRSxDQUFD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QW1CO0FBQ2ZoQyxhQUFDLENBQUNnQyxhQUFELENBQUQsQ0FBaUJTLE9BQWpCLENBQXlCLE1BQXpCO0FBQ0gsV0FGRCxNQUdLO0FBQ0Q7QUFDQXpDLGFBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVTBDLElBQVYsQ0FBZSxHQUFmLEVBQW9CQyxNQUFwQixDQUEyQixzQkFBM0IsRUFBbURDLEtBQW5EO0FBQ0g7QUFDSjtBQW5CRSxPQUFQO0FBcUJIO0FBQ0osR0F6Q0QsRUF5Q0czQyxFQXpDSCxDQXlDTSxXQXpDTixFQXlDbUIsVUFBU3lCLENBQVQsRUFBVztBQUMxQkQsa0JBQWMsR0FBRyxJQUFqQjtBQUNILEdBM0NELEVBMkNHeEIsRUEzQ0gsQ0EyQ00sWUEzQ04sRUEyQ29CLFlBQVU7QUFDMUJ3QixrQkFBYyxHQUFHLEtBQWpCO0FBQ0gsR0E3Q0Q7QUErQ1AsQ0FsREQ7QUFvRElvQixPQUFPLENBQUNDLEdBQVIsQ0FBWSxpQkFBWixFIiwiZmlsZSI6ImZvcm1Mb2FkLjI1MjJjYTJhLmpzIiwic291cmNlc0NvbnRlbnQiOlsiZnVuY3Rpb24gUmV2ZWFsKHNpemUsIG9yaWdpbikge1xuICAgIHZhciBlbCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpO1xuICAgIGVsLmNsYXNzTmFtZSA9IFwicmV2ZWFsIFwiICsgc2l6ZTtcbiAgICBlbC5zZXRBdHRyaWJ1dGUoXCJkYXRhLXJldmVhbFwiLCBcIlwiKTtcbiAgICBlbC5zZXRBdHRyaWJ1dGUoXCJyb2xlXCIsIFwiZGlhbG9nXCIpO1xuICAgIGVsLnNldEF0dHJpYnV0ZShcImRhdGEtb3B0aW9uc1wiLCBcImNsb3NlT25DbGljazpmYWxzZTtcIik7XG4gICAgZWwucmV2ZWFsb2JqZWN0ID0gdGhpcztcbiAgICBlbC5pbm5lckhUTUwgPSAnJztcbiAgICB0aGlzLm9yaWdpbiA9IG9yaWdpbjtcbiAgICB0aGlzLmVsID0gZG9jdW1lbnQuYm9keS5hcHBlbmRDaGlsZChlbCk7XG4gICAgZXZlbnRMaXN0ZW5lcnModGhpcy5lbCk7XG4gICAgJCh0aGlzLmVsKS5vbignY2xvc2VkLnpmLnJldmVhbCcsIGZ1bmN0aW9uKGV2ZW50LCBsYXJnZSkge1xuICAgICAgICAkKHRoaXMpLmNsb3Nlc3QoJ2Rpdi5yZXZlYWwtb3ZlcmxheScpLnJlbW92ZSgpO1xuXG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9KTtcbiAgICAkKHRoaXMuZWwpLm9uKCdjbG9zZW1lLnpmLnJldmVhbCcsIGZ1bmN0aW9uKGV2ZW50LCBsYXJnZSkge1xuXG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9KTtcbn1cblxuZnVuY3Rpb24gZXZlbnRMaXN0ZW5lcnMoc2NvcGUpIHtcbiAgICBzY29wZSA9IHNjb3BlIHx8IGRvY3VtZW50O1xuICAgIHZhciBkYXRlRm9ybWF0ID0gJ2RkLW1tLXl5JztcbiAgICB2YXIgZGF0ZXBpY2tlclNldHRpbmdzID0ge1xuICAgICAgICBkYXRlRm9ybWF0OiBkYXRlRm9ybWF0LFxuXG4gICAgICAgIHNob3dXZWVrOiB0cnVlLFxuICAgICAgICBudW1iZXJPZk1vbnRoczogMSxcbiAgICAgICAgcHJldlRleHQ6ICcgJyxcbiAgICAgICAgbmV4dFRleHQ6ICcgJyxcbiAgICAgICAgd2Vla0hlYWRlcjogJyAnLFxuICAgICAgICBmaXJzdERheTogMSxcbiAgICAgICAgZGF5TmFtZXM6IFsgJ1pvbmRhZycsICdNYW5kYWFnJywgJ0RpbnNkYWcnLCAnV29lbnNkYWcnLCAnRG9uZGVyZGFnJywgJ1ZyaWpkYWcnLCAnWmF0ZXJkYWcnIF0sXG4gICAgICAgIGRheU5hbWVzTWluOiBbICdabycsICdNYScsICdEaScsICdXbycsICdEbycsICdWcicsICdaYScgXSxcbiAgICAgICAgbW9udGhOYW1lczogWyAnSmFudWFyaScsICdGZWJydWFyaScsICdNYWFydCcsICdBcHJpbCcsICdNZWknLCAnSnVuaScsICdKdWxpJywgJ0F1Z3VzdHVzJywgJ1NlcHRlbWJlcicsICdPa3RvYmVyJywgJ05vdmVtYmVyJywgJ0RlY2VtYmVyJyBdLFxuICAgICAgICBtb250aE5hbWVzU2hvcnQ6IFsgJ0phbicsICdGZWInLCAnTWFyJywgJ0FwcicsICdNYWonLCAnSnVuJywgJ0p1bCcsICdBdWcnLCAnU2VwJywgJ09rdCcsICdOb3YnLCAnRGVjJyBdLFxuICAgICAgICBiZWZvcmVTaG93OiBmdW5jdGlvbihpbnB1dCwgaW5zdCkge1xuICAgICAgICAgICAgJCgnI3VpLWRhdGVwaWNrZXItZGl2JykuYWRkQ2xhc3MoJ3N0YW5kYWxvbmUtZGF0ZXBpY2tlcicpO1xuICAgICAgICB9XG4gICAgfTtcbiAgICAvLyAkKCcuZGF0ZXBpY2tlcicsIHNjb3BlKS5kYXRlcGlja2VyKGRhdGVwaWNrZXJTZXR0aW5ncyk7XG4gICAgLy8gJChcIi5kYXRlcGlja2VyZnJvbVwiLCBzY29wZSkuZGF0ZXBpY2tlcihkYXRlcGlja2VyU2V0dGluZ3MpXG4gICAgLy8gICAgIC5vbiggXCJjaGFuZ2VcIiwgZnVuY3Rpb24oKSB7XG4gICAgLy8gICAgICAgICAkKCcjJyArIHRoaXMuaWQuc2xpY2UoMCwgLTQpICsgJ3RpbGwnKS5kYXRlcGlja2VyKCBcIm9wdGlvblwiLCBcIm1pbkRhdGVcIiwgZ2V0RGF0ZSggdGhpcyApIClcbiAgICAvLyAgICAgfSApXG4gICAgLy8gJChcIi5kYXRlcGlja2VydGlsbFwiLCBzY29wZSkuZGF0ZXBpY2tlcihkYXRlcGlja2VyU2V0dGluZ3MpXG4gICAgLy8gICAgIC5vbiggXCJjaGFuZ2VcIiwgZnVuY3Rpb24oKSB7XG4gICAgLy8gICAgICAgICAkKCcjJyArIHRoaXMuaWQuc2xpY2UoMCwgLTQpICsgJ2Zyb20nKS5kYXRlcGlja2VyKCBcIm9wdGlvblwiLCBcIm1heERhdGVcIiwgZ2V0RGF0ZSggdGhpcyApIClcbiAgICAvLyAgICAgfSApXG5cbiAgICAvLyBmdW5jdGlvbiBnZXREYXRlKCBlbGVtZW50ICkge1xuICAgIC8vICAgICB0cnkge1xuICAgIC8vICAgICAgICAgcmV0dXJuICQuZGF0ZXBpY2tlci5wYXJzZURhdGUoIGRhdGVGb3JtYXQsIGVsZW1lbnQudmFsdWUgKTtcbiAgICAvLyAgICAgfSBjYXRjaCggZXJyb3IgKSB7XG4gICAgLy8gICAgICAgICByZXR1cm4gbnVsbDtcbiAgICAvLyAgICAgfVxuICAgIC8vIH1cbiAgICAvLyAkKHNjb3BlLCAnLnByaWNlQ2FsYycpLm9uKCdjaGFuZ2UnLCBmdW5jdGlvbihlKSB7XG4gICAgLy8gICAgIGNhbGN1bGF0ZUludm9pY2VQcmljZShlLnRhcmdldCk7XG4gICAgLy8gfSk7XG4gICAgLy8gJCgnLnNlbGVjdDJlbnRpdHknKS5zZWxlY3QyZW50aXR5KCk7XG4gICAgLy8gJCgnLnN1Ym1pdC1yZXZlYWwnKS5vbignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgLy8gICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAvLyAgICAgJCh0aGlzKS5jbG9zZXN0KCdmb3JtJykuc3VibWl0KCk7XG4gICAgLy8gICAgICQodGhpcykuY2xvc2VzdCgnZGl2LnJldmVhbC1vdmVybGF5JykucmVtb3ZlKCk7XG4gICAgLy8gfSk7XG59XG5cblxud2luZG93LlJldmVhbCA9IFJldmVhbFxuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpe1xuXG4gICAgdmFyIHBhdGhUb3VjaE1vdmVkID0gZmFsc2U7XG4gICAgICAgICQoJ2JvZHknKS5vbignY2xpY2sgdG91Y2hlbmQnLCAnW2RhdGEtcGF0aF0nLCBmdW5jdGlvbihlKSB7XG5cbiAgICAgICAgICAgIGlmIChwYXRoVG91Y2hNb3ZlZCAhPSB0cnVlKSB7XG5cbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgICAgICAgICAkKHRoaXMpLmRpc2FibGVkID0gdHJ1ZTtcblxuICAgICAgICAgICAgICAgIHZhciBwYXRoID0gJCh0aGlzKS5hdHRyKFwiZGF0YS1wYXRoXCIpO1xuICAgICAgICAgICAgICAgIC8vaWYgKHBhdGhbMF0gIT09ICcvJylcbiAgICAgICAgICAgICAgICAvLyAgICBSb3V0aW5nLmdlbmVyYXRlKHBhdGgpO1xuICAgICAgICAgICAgICAgIC8vY29uc29sZS5sb2cocGF0aCk7XG5cbiAgICAgICAgICAgICAgICB2YXIgc2l6ZSA9ICQodGhpcykuYXR0cihcImRhdGEtcmV2ZWFsLXNpemVcIik7XG4gICAgICAgICAgICAgICAgdmFyIG9yaWdpbiA9IHRoaXM7XG5cbiAgICAgICAgICAgICAgICB2YXIgcmV2ZWFsID0gbmV3IFJldmVhbChzaXplID8gc2l6ZSA6ICdsYXJnZScsIG9yaWdpbik7XG4gICAgICAgICAgICAgICAgdmFyIGVsZW1lbnRUb09wZW4gPSAkKHRoaXMpLmF0dHIoXCJkYXRhLW9wZW4tZWxlbWVudFwiKTtcblxuICAgICAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgICAgIHR5cGU6ICdHRVQnLFxuICAgICAgICAgICAgICAgICAgICB1cmw6IHBhdGgsXG4gICAgICAgICAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpIHtcblxuICAgICAgICAgICAgICAgICAgICAgICAgJChyZXZlYWwuZWwpLmZvdW5kYXRpb24oKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICQocmV2ZWFsLmVsKS5odG1sKGRhdGEpLmZvdW5kYXRpb24oJ29wZW4nKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJz4gZGl2JywgcmV2ZWFsLmVsKS5mb3VuZGF0aW9uKCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIGNoYW5nZUZvcm1SZXN1bHQoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGV2ZW50TGlzdGVuZXJzKCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChlbGVtZW50VG9PcGVuKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJChlbGVtZW50VG9PcGVuKS5zZWxlY3QyKCdvcGVuJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBmb2N1cyBmaXJzdCB2aXNpYmxlIGZpZWxkIGluIGZvcm1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKCdmb3JtJykuZmluZCgnKicpLmZpbHRlcignOmlucHV0OnZpc2libGU6Zmlyc3QnKS5mb2N1cygpO1xuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pLm9uKCd0b3VjaG1vdmUnLCBmdW5jdGlvbihlKXtcbiAgICAgICAgICAgIHBhdGhUb3VjaE1vdmVkID0gdHJ1ZTtcbiAgICAgICAgfSkub24oJ3RvdWNoc3RhcnQnLCBmdW5jdGlvbigpe1xuICAgICAgICAgICAgcGF0aFRvdWNoTW92ZWQgPSBmYWxzZTtcbiAgICAgICAgfSk7XG5cbn0pO1xuXG4gICAgY29uc29sZS5sb2coXCJmb3JtTG9hZCBsb2FkZWRcIik7Il0sInNvdXJjZVJvb3QiOiIifQ==