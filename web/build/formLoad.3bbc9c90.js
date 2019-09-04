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

function changeFormResult() {
  $('form[formresult="json"]').submit(function (e) {
    var formElm = $(this);
    var reveal = $(this).closest('.reveal').get(0).revealobject;
    e.preventDefault();

    try {
      var formUrl = $(formElm).attr('action');
      var formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: formUrl,
        data: formData,
        async: true,
        success: function success(response) {
          var selectElm = $(reveal.origin).closest('.form-collection-add').find('select').first();
          selectElm.append($('<option>', {
            value: response.id
          }).text(response.name));
          selectElm.val(response.id);
          formElm.closest('.reveal').foundation('close');
        },
        error: function error(XMLHttpRequest, textStatus, errorThrown) {}
      });
    } catch (ex) {
      alert(ex.message);
    }

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
  };
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hcHAvUmVzb3VyY2VzL2Fzc2V0cy9qcy9mb3JtTG9hZC5qcyJdLCJuYW1lcyI6WyJSZXZlYWwiLCJzaXplIiwib3JpZ2luIiwiZWwiLCJkb2N1bWVudCIsImNyZWF0ZUVsZW1lbnQiLCJjbGFzc05hbWUiLCJzZXRBdHRyaWJ1dGUiLCJyZXZlYWxvYmplY3QiLCJpbm5lckhUTUwiLCJib2R5IiwiYXBwZW5kQ2hpbGQiLCJldmVudExpc3RlbmVycyIsIiQiLCJvbiIsImV2ZW50IiwibGFyZ2UiLCJjbG9zZXN0IiwicmVtb3ZlIiwiY2hhbmdlRm9ybVJlc3VsdCIsInN1Ym1pdCIsImUiLCJmb3JtRWxtIiwicmV2ZWFsIiwiZ2V0IiwicHJldmVudERlZmF1bHQiLCJmb3JtVXJsIiwiYXR0ciIsImZvcm1EYXRhIiwic2VyaWFsaXplIiwiYWpheCIsInR5cGUiLCJ1cmwiLCJkYXRhIiwiYXN5bmMiLCJzdWNjZXNzIiwicmVzcG9uc2UiLCJzZWxlY3RFbG0iLCJmaW5kIiwiZmlyc3QiLCJhcHBlbmQiLCJ2YWx1ZSIsImlkIiwidGV4dCIsIm5hbWUiLCJ2YWwiLCJmb3VuZGF0aW9uIiwiZXJyb3IiLCJYTUxIdHRwUmVxdWVzdCIsInRleHRTdGF0dXMiLCJlcnJvclRocm93biIsImV4IiwiYWxlcnQiLCJtZXNzYWdlIiwic2NvcGUiLCJkYXRlRm9ybWF0IiwiZGF0ZXBpY2tlclNldHRpbmdzIiwic2hvd1dlZWsiLCJudW1iZXJPZk1vbnRocyIsInByZXZUZXh0IiwibmV4dFRleHQiLCJ3ZWVrSGVhZGVyIiwiZmlyc3REYXkiLCJkYXlOYW1lcyIsImRheU5hbWVzTWluIiwibW9udGhOYW1lcyIsIm1vbnRoTmFtZXNTaG9ydCIsImJlZm9yZVNob3ciLCJpbnB1dCIsImluc3QiLCJhZGRDbGFzcyIsIndpbmRvdyIsInJlYWR5IiwicGF0aFRvdWNoTW92ZWQiLCJkaXNhYmxlZCIsInBhdGgiLCJlbGVtZW50VG9PcGVuIiwiaHRtbCIsInNlbGVjdDIi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RkY7QUFHSHhDLGVBQU8sRUFBRSxpQkFBU0YsSUFBVCxFQUFlO0FBRXBCcEIsV0FBQyxDQUFDVSxNQUFNLENBQUNwQixFQUFSLENBQUQsQ0FBYTJDLFVBQWI7QUFDQWpDLFdBQUMsQ0FBQ1UsTUFBTSxDQUFDcEIsRUFBUixDQUFELENBQWEwRSxJQUFiLENBQWtCNUMsSUFBbEIsRUFBd0JhLFVBQXhCLENBQW1DLE1BQW5DO0FBQ0FqQyxXQUFDLENBQUMsT0FBRCxFQUFVVSxNQUFNLENBQUNwQixFQUFqQixDQUFELENBQXNCMkMsVUFBdEI7QUFFQTNCLDBCQUFnQjtBQUNoQlAsd0JBQWM7O0FBRWQsY0FBSWdFLGFBQUosRUFBbUI7QUFDZi9ELGFBQUMsQ0FBQytELGFBQUQsQ0FBRCxDQUFpQkUsT0FBakIsQ0FBeUIsTUFBekI7QUFDSCxXQUZELE1BR0s7QUFDRDtBQUNBakUsYUFBQyxDQUFDLE1BQUQsQ0FBRCxDQUFVeUIsSUFBVixDQUFlLEdBQWYsRUFBb0J5QyxNQUFwQixDQUEyQixzQkFBM0IsRUFBbURDLEtBQW5EO0FBQ0g7QUFDSjtBQW5CRSxPQUFQO0FBcUJIO0FBQ0osR0F6Q0QsRUF5Q0dsRSxFQXpDSCxDQXlDTSxXQXpDTixFQXlDbUIsVUFBU08sQ0FBVCxFQUFXO0FBQzFCb0Qsa0JBQWMsR0FBRyxJQUFqQjtBQUNILEdBM0NELEVBMkNHM0QsRUEzQ0gsQ0EyQ00sWUEzQ04sRUEyQ29CLFlBQVU7QUFDMUIyRCxrQkFBYyxHQUFHLEtBQWpCO0FBQ0gsR0E3Q0Q7QUErQ1AsQ0FsREQ7QUFvRElRLE9BQU8sQ0FBQ0MsR0FBUixDQUFZLGlCQUFaLEUiLCJmaWxlIjoiZm9ybUxvYWQuM2JiYzljOTAuanMiLCJzb3VyY2VzQ29udGVudCI6WyJmdW5jdGlvbiBSZXZlYWwoc2l6ZSwgb3JpZ2luKSB7XG4gICAgdmFyIGVsID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7XG4gICAgZWwuY2xhc3NOYW1lID0gXCJyZXZlYWwgXCIgKyBzaXplO1xuICAgIGVsLnNldEF0dHJpYnV0ZShcImRhdGEtcmV2ZWFsXCIsIFwiXCIpO1xuICAgIGVsLnNldEF0dHJpYnV0ZShcInJvbGVcIiwgXCJkaWFsb2dcIik7XG4gICAgZWwuc2V0QXR0cmlidXRlKFwiZGF0YS1vcHRpb25zXCIsIFwiY2xvc2VPbkNsaWNrOmZhbHNlO1wiKTtcbiAgICBlbC5yZXZlYWxvYmplY3QgPSB0aGlzO1xuICAgIGVsLmlubmVySFRNTCA9ICcnO1xuICAgIHRoaXMub3JpZ2luID0gb3JpZ2luO1xuICAgIHRoaXMuZWwgPSBkb2N1bWVudC5ib2R5LmFwcGVuZENoaWxkKGVsKTtcbiAgICBldmVudExpc3RlbmVycyh0aGlzLmVsKTtcbiAgICAkKHRoaXMuZWwpLm9uKCdjbG9zZWQuemYucmV2ZWFsJywgZnVuY3Rpb24oZXZlbnQsIGxhcmdlKSB7XG4gICAgICAgICQodGhpcykuY2xvc2VzdCgnZGl2LnJldmVhbC1vdmVybGF5JykucmVtb3ZlKCk7XG5cbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH0pO1xuICAgICQodGhpcy5lbCkub24oJ2Nsb3NlbWUuemYucmV2ZWFsJywgZnVuY3Rpb24oZXZlbnQsIGxhcmdlKSB7XG5cbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH0pO1xufVxuZnVuY3Rpb24gY2hhbmdlRm9ybVJlc3VsdCgpIHtcblxuICAgICQoJ2Zvcm1bZm9ybXJlc3VsdD1cImpzb25cIl0nKS5zdWJtaXQoZnVuY3Rpb24oZSkge1xuXG4gICAgICAgIHZhciBmb3JtRWxtID0gJCh0aGlzKTtcbiAgICAgICAgdmFyIHJldmVhbCA9ICQodGhpcykuY2xvc2VzdCgnLnJldmVhbCcpLmdldCgwKS5yZXZlYWxvYmplY3Q7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICB0cnkge1xuXG4gICAgICAgICAgICB2YXIgZm9ybVVybCA9ICQoZm9ybUVsbSkuYXR0cignYWN0aW9uJyk7XG4gICAgICAgICAgICB2YXIgZm9ybURhdGEgPSAkKHRoaXMpLnNlcmlhbGl6ZSgpO1xuXG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHR5cGU6IFwiUE9TVFwiLFxuICAgICAgICAgICAgICAgIHVybDogZm9ybVVybCxcbiAgICAgICAgICAgICAgICBkYXRhOiBmb3JtRGF0YSxcbiAgICAgICAgICAgICAgICBhc3luYzogdHJ1ZSxcbiAgICAgICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbihyZXNwb25zZSlcbiAgICAgICAgICAgICAgICB7XG4gICAgICAgICAgICAgICAgICAgIHZhciBzZWxlY3RFbG0gPSAkKHJldmVhbC5vcmlnaW4pLmNsb3Nlc3QoJy5mb3JtLWNvbGxlY3Rpb24tYWRkJykuZmluZCgnc2VsZWN0JykuZmlyc3QoKTtcbiAgICAgICAgICAgICAgICAgICAgc2VsZWN0RWxtLmFwcGVuZChcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJzxvcHRpb24+JywgeyB2YWx1ZTogcmVzcG9uc2UuaWQgfSkudGV4dChyZXNwb25zZS5uYW1lKVxuICAgICAgICAgICAgICAgICAgICApO1xuICAgICAgICAgICAgICAgICAgICBzZWxlY3RFbG0udmFsKHJlc3BvbnNlLmlkKTtcblxuICAgICAgICAgICAgICAgICAgICBmb3JtRWxtLmNsb3Nlc3QoJy5yZXZlYWwnKS5mb3VuZGF0aW9uKCdjbG9zZScpO1xuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgZXJyb3I6IGZ1bmN0aW9uKFhNTEh0dHBSZXF1ZXN0LCB0ZXh0U3RhdHVzLCBlcnJvclRocm93bilcbiAgICAgICAgICAgICAgICB7XG5cbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICAgICAgY2F0Y2goZXgpIHtcbiAgICAgICAgICAgIGFsZXJ0KGV4Lm1lc3NhZ2UpO1xuICAgICAgICB9XG5cbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH0pO1xufVxuZnVuY3Rpb24gZXZlbnRMaXN0ZW5lcnMoc2NvcGUpIHtcbiAgICBzY29wZSA9IHNjb3BlIHx8IGRvY3VtZW50O1xuICAgIHZhciBkYXRlRm9ybWF0ID0gJ2RkLW1tLXl5JztcbiAgICB2YXIgZGF0ZXBpY2tlclNldHRpbmdzID0ge1xuICAgICAgICBkYXRlRm9ybWF0OiBkYXRlRm9ybWF0LFxuXG4gICAgICAgIHNob3dXZWVrOiB0cnVlLFxuICAgICAgICBudW1iZXJPZk1vbnRoczogMSxcbiAgICAgICAgcHJldlRleHQ6ICcgJyxcbiAgICAgICAgbmV4dFRleHQ6ICcgJyxcbiAgICAgICAgd2Vla0hlYWRlcjogJyAnLFxuICAgICAgICBmaXJzdERheTogMSxcbiAgICAgICAgZGF5TmFtZXM6IFsgJ1pvbmRhZycsICdNYW5kYWFnJywgJ0RpbnNkYWcnLCAnV29lbnNkYWcnLCAnRG9uZGVyZGFnJywgJ1ZyaWpkYWcnLCAnWmF0ZXJkYWcnIF0sXG4gICAgICAgIGRheU5hbWVzTWluOiBbICdabycsICdNYScsICdEaScsICdXbycsICdEbycsICdWcicsICdaYScgXSxcbiAgICAgICAgbW9udGhOYW1lczogWyAnSmFudWFyaScsICdGZWJydWFyaScsICdNYWFydCcsICdBcHJpbCcsICdNZWknLCAnSnVuaScsICdKdWxpJywgJ0F1Z3VzdHVzJywgJ1NlcHRlbWJlcicsICdPa3RvYmVyJywgJ05vdmVtYmVyJywgJ0RlY2VtYmVyJyBdLFxuICAgICAgICBtb250aE5hbWVzU2hvcnQ6IFsgJ0phbicsICdGZWInLCAnTWFyJywgJ0FwcicsICdNYWonLCAnSnVuJywgJ0p1bCcsICdBdWcnLCAnU2VwJywgJ09rdCcsICdOb3YnLCAnRGVjJyBdLFxuICAgICAgICBiZWZvcmVTaG93OiBmdW5jdGlvbihpbnB1dCwgaW5zdCkge1xuICAgICAgICAgICAgJCgnI3VpLWRhdGVwaWNrZXItZGl2JykuYWRkQ2xhc3MoJ3N0YW5kYWxvbmUtZGF0ZXBpY2tlcicpO1xuICAgICAgICB9XG4gICAgfTtcbn1cblxuXG53aW5kb3cuUmV2ZWFsID0gUmV2ZWFsXG5cbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCl7XG5cbiAgICB2YXIgcGF0aFRvdWNoTW92ZWQgPSBmYWxzZTtcbiAgICAgICAgJCgnYm9keScpLm9uKCdjbGljayB0b3VjaGVuZCcsICdbZGF0YS1wYXRoXScsIGZ1bmN0aW9uKGUpIHtcblxuICAgICAgICAgICAgaWYgKHBhdGhUb3VjaE1vdmVkICE9IHRydWUpIHtcblxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICAgICAgICAgICQodGhpcykuZGlzYWJsZWQgPSB0cnVlO1xuXG4gICAgICAgICAgICAgICAgdmFyIHBhdGggPSAkKHRoaXMpLmF0dHIoXCJkYXRhLXBhdGhcIik7XG4gICAgICAgICAgICAgICAgLy9pZiAocGF0aFswXSAhPT0gJy8nKVxuICAgICAgICAgICAgICAgIC8vICAgIFJvdXRpbmcuZ2VuZXJhdGUocGF0aCk7XG4gICAgICAgICAgICAgICAgLy9jb25zb2xlLmxvZyhwYXRoKTtcblxuICAgICAgICAgICAgICAgIHZhciBzaXplID0gJCh0aGlzKS5hdHRyKFwiZGF0YS1yZXZlYWwtc2l6ZVwiKTtcbiAgICAgICAgICAgICAgICB2YXIgb3JpZ2luID0gdGhpcztcblxuICAgICAgICAgICAgICAgIHZhciByZXZlYWwgPSBuZXcgUmV2ZWFsKHNpemUgPyBzaXplIDogJ2xhcmdlJywgb3JpZ2luKTtcbiAgICAgICAgICAgICAgICB2YXIgZWxlbWVudFRvT3BlbiA9ICQodGhpcykuYXR0cihcImRhdGEtb3Blbi1lbGVtZW50XCIpO1xuXG4gICAgICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICAgICAgdHlwZTogJ0dFVCcsXG4gICAgICAgICAgICAgICAgICAgIHVybDogcGF0aCxcbiAgICAgICAgICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuXG4gICAgICAgICAgICAgICAgICAgICAgICAkKHJldmVhbC5lbCkuZm91bmRhdGlvbigpO1xuICAgICAgICAgICAgICAgICAgICAgICAgJChyZXZlYWwuZWwpLmh0bWwoZGF0YSkuZm91bmRhdGlvbignb3BlbicpO1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnPiBkaXYnLCByZXZlYWwuZWwpLmZvdW5kYXRpb24oKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgY2hhbmdlRm9ybVJlc3VsdCgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgZXZlbnRMaXN0ZW5lcnMoKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGVsZW1lbnRUb09wZW4pIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKGVsZW1lbnRUb09wZW4pLnNlbGVjdDIoJ29wZW4nKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIGZvY3VzIGZpcnN0IHZpc2libGUgZmllbGQgaW4gZm9ybVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoJ2Zvcm0nKS5maW5kKCcqJykuZmlsdGVyKCc6aW5wdXQ6dmlzaWJsZTpmaXJzdCcpLmZvY3VzKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSkub24oJ3RvdWNobW92ZScsIGZ1bmN0aW9uKGUpe1xuICAgICAgICAgICAgcGF0aFRvdWNoTW92ZWQgPSB0cnVlO1xuICAgICAgICB9KS5vbigndG91Y2hzdGFydCcsIGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICBwYXRoVG91Y2hNb3ZlZCA9IGZhbHNlO1xuICAgICAgICB9KTtcblxufSk7XG5cbiAgICBjb25zb2xlLmxvZyhcImZvcm1Mb2FkIGxvYWRlZFwiKTsiXSwic291cmNlUm9vdCI6IiJ9