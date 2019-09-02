(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["functions"],{

/***/ "./app/Resources/assets/js/functions.js":
/*!**********************************************!*\
  !*** ./app/Resources/assets/js/functions.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module) {// search field in index.html.twig
module["export"] = __webpack_require__(/*! functions */ "./node_modules/functions/index.js");

function emptyForm() {
  document.getElementById("zoeken").reset();
}

$(document).ready(function () {
  $("#myInput").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
}); // flash message

setTimeout(function () {
  $('.flash-success').fadeOut('slow');
}, 5000); // <-- time in milliseconds

console.log("Functions loaded");
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../node_modules/webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module)))

/***/ }),

/***/ "./node_modules/functions/index.js":
/*!*****************************************!*\
  !*** ./node_modules/functions/index.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = {
  list: ["censor", "echo", "md5cracker", "nextprime", "sentiment"],
  censor: "https://gist.githubusercontent.com/computes/6d3659a428863dd6c5d9903c9f851a0a/raw/4a971bab2205699a5b782c04c213459008e0680f/censorfunction.js",
  echo:  "https://gist.githubusercontent.com/computes/df86808c4a9d0a0d489a/raw/11c92b86662a4df5b5db585a1442796333bd1934/test.js",
  md5cracker: "https://raw.githubusercontent.com/computes/operations/master/md5cracker/index.js",
  nextprime: "https://raw.githubusercontent.com/computes/operations/master/nextprime/index.js",
  sentiment:  "https://raw.githubusercontent.com/computes/operations/master/sentiment/index.js"
};


/***/ }),

/***/ "./node_modules/webpack/buildin/module.js":
/*!***********************************!*\
  !*** (webpack)/buildin/module.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(module) {
	if (!module.webpackPolyfill) {
		module.deprecate = function() {};
		module.paths = [];
		// module.parent = undefined by default
		if (!module.children) module.children = [];
		Object.defineProperty(module, "loaded", {
			enumerable: true,
			get: function() {
				return module.l;
			}
		});
		Object.defineProperty(module, "id", {
			enumerable: true,
			get: function() {
				return module.i;
			}
		});
		module.webpackPolyfill = 1;
	}
	return module;
};


/***/ })

},[["./app/Resources/assets/js/functions.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hcHAvUmVzb3VyY2VzL2Fzc2V0cy9qcy9mdW5jdGlvbnMuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2Z1bmN0aW9ucy9pbmRleC5qcyIsIndlYnBhY2s6Ly8vKHdlYnBhY2spL2J1aWxkaW4vbW9kdWxlLmpzIl0sIm5hbWVzIjpbIm1vZHVsZSIsInJlcXVpcmUiLCJlbXB0eUZvcm0iLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwicmVzZXQiLCIkIiwicmVhZHkiLCJvbiIsInZhbHVlIiwidmFsIiwidG9Mb3dlckNhc2UiLCJmaWx0ZXIiLCJ0b2dnbGUiLCJ0ZXh0IiwiaW5kZXhPZiIsInNldFRpbWVvdXQiLCJmYWRlT3V0IiwiY29uc29sZSIsImxvZyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUE7QUFFQUEsTUFBTSxVQUFOLEdBQWdCQyxtQkFBTyxDQUFDLG9EQUFELENBQXZCOztBQUdBLFNBQVNDLFNBQVQsR0FBcUI7QUFDakJDLFVBQVEsQ0FBQ0MsY0FBVCxDQUF3QixRQUF4QixFQUFrQ0MsS0FBbEM7QUFDSDs7QUFHREMsQ0FBQyxDQUFDSCxRQUFELENBQUQsQ0FBWUksS0FBWixDQUFrQixZQUFVO0FBRXhCRCxHQUFDLENBQUMsVUFBRCxDQUFELENBQWNFLEVBQWQsQ0FBaUIsT0FBakIsRUFBMEIsWUFBVztBQUNqQyxRQUFJQyxLQUFLLEdBQUdILENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUksR0FBUixHQUFjQyxXQUFkLEVBQVo7QUFDQUwsS0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQk0sTUFBakIsQ0FBd0IsWUFBVztBQUMvQk4sT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTyxNQUFSLENBQWVQLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVEsSUFBUixHQUFlSCxXQUFmLEdBQTZCSSxPQUE3QixDQUFxQ04sS0FBckMsSUFBOEMsQ0FBQyxDQUE5RDtBQUVILEtBSEQ7QUFJSCxHQU5EO0FBT0gsQ0FURCxFLENBWUE7O0FBQ0FPLFVBQVUsQ0FBQyxZQUFXO0FBQ2xCVixHQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQlcsT0FBcEIsQ0FBNEIsTUFBNUI7QUFDSCxDQUZTLEVBRVAsSUFGTyxDQUFWLEMsQ0FFVTs7QUFJVkMsT0FBTyxDQUFDQyxHQUFSLENBQVksa0JBQVosRTs7Ozs7Ozs7Ozs7O0FDN0JBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7OztBQ1BBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQSIsImZpbGUiOiJmdW5jdGlvbnMuM2Q4NjA3OGEuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBzZWFyY2ggZmllbGQgaW4gaW5kZXguaHRtbC50d2lnXG5cbm1vZHVsZS5leHBvcnQgPSByZXF1aXJlKFwiZnVuY3Rpb25zXCIpO1xuXG5cbmZ1bmN0aW9uIGVtcHR5Rm9ybSgpIHtcbiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInpvZWtlblwiKS5yZXNldCgpO1xufVxuXG5cbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCl7XG4gICAgXG4gICAgJChcIiNteUlucHV0XCIpLm9uKFwia2V5dXBcIiwgZnVuY3Rpb24oKSB7XG4gICAgICAgIHZhciB2YWx1ZSA9ICQodGhpcykudmFsKCkudG9Mb3dlckNhc2UoKTtcbiAgICAgICAgJChcIiNteVRhYmxlIHRyXCIpLmZpbHRlcihmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQodGhpcykudG9nZ2xlKCQodGhpcykudGV4dCgpLnRvTG93ZXJDYXNlKCkuaW5kZXhPZih2YWx1ZSkgPiAtMSlcbiAgICAgICAgICAgIFxuICAgICAgICB9KTtcbiAgICB9KTtcbn0pO1xuXG5cbi8vIGZsYXNoIG1lc3NhZ2VcbnNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG4gICAgJCgnLmZsYXNoLXN1Y2Nlc3MnKS5mYWRlT3V0KCdzbG93Jyk7XG59LCA1MDAwKTsgLy8gPC0tIHRpbWUgaW4gbWlsbGlzZWNvbmRzXG5cblxuXG5jb25zb2xlLmxvZyhcIkZ1bmN0aW9ucyBsb2FkZWRcIik7IiwibW9kdWxlLmV4cG9ydHMgPSB7XG4gIGxpc3Q6IFtcImNlbnNvclwiLCBcImVjaG9cIiwgXCJtZDVjcmFja2VyXCIsIFwibmV4dHByaW1lXCIsIFwic2VudGltZW50XCJdLFxuICBjZW5zb3I6IFwiaHR0cHM6Ly9naXN0LmdpdGh1YnVzZXJjb250ZW50LmNvbS9jb21wdXRlcy82ZDM2NTlhNDI4ODYzZGQ2YzVkOTkwM2M5Zjg1MWEwYS9yYXcvNGE5NzFiYWIyMjA1Njk5YTViNzgyYzA0YzIxMzQ1OTAwOGUwNjgwZi9jZW5zb3JmdW5jdGlvbi5qc1wiLFxuICBlY2hvOiAgXCJodHRwczovL2dpc3QuZ2l0aHVidXNlcmNvbnRlbnQuY29tL2NvbXB1dGVzL2RmODY4MDhjNGE5ZDBhMGQ0ODlhL3Jhdy8xMWM5MmI4NjY2MmE0ZGY1YjVkYjU4NWExNDQyNzk2MzMzYmQxOTM0L3Rlc3QuanNcIixcbiAgbWQ1Y3JhY2tlcjogXCJodHRwczovL3Jhdy5naXRodWJ1c2VyY29udGVudC5jb20vY29tcHV0ZXMvb3BlcmF0aW9ucy9tYXN0ZXIvbWQ1Y3JhY2tlci9pbmRleC5qc1wiLFxuICBuZXh0cHJpbWU6IFwiaHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL2NvbXB1dGVzL29wZXJhdGlvbnMvbWFzdGVyL25leHRwcmltZS9pbmRleC5qc1wiLFxuICBzZW50aW1lbnQ6ICBcImh0dHBzOi8vcmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbS9jb21wdXRlcy9vcGVyYXRpb25zL21hc3Rlci9zZW50aW1lbnQvaW5kZXguanNcIlxufTtcbiIsIm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24obW9kdWxlKSB7XG5cdGlmICghbW9kdWxlLndlYnBhY2tQb2x5ZmlsbCkge1xuXHRcdG1vZHVsZS5kZXByZWNhdGUgPSBmdW5jdGlvbigpIHt9O1xuXHRcdG1vZHVsZS5wYXRocyA9IFtdO1xuXHRcdC8vIG1vZHVsZS5wYXJlbnQgPSB1bmRlZmluZWQgYnkgZGVmYXVsdFxuXHRcdGlmICghbW9kdWxlLmNoaWxkcmVuKSBtb2R1bGUuY2hpbGRyZW4gPSBbXTtcblx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkobW9kdWxlLCBcImxvYWRlZFwiLCB7XG5cdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuXHRcdFx0Z2V0OiBmdW5jdGlvbigpIHtcblx0XHRcdFx0cmV0dXJuIG1vZHVsZS5sO1xuXHRcdFx0fVxuXHRcdH0pO1xuXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShtb2R1bGUsIFwiaWRcIiwge1xuXHRcdFx0ZW51bWVyYWJsZTogdHJ1ZSxcblx0XHRcdGdldDogZnVuY3Rpb24oKSB7XG5cdFx0XHRcdHJldHVybiBtb2R1bGUuaTtcblx0XHRcdH1cblx0XHR9KTtcblx0XHRtb2R1bGUud2VicGFja1BvbHlmaWxsID0gMTtcblx0fVxuXHRyZXR1cm4gbW9kdWxlO1xufTtcbiJdLCJzb3VyY2VSb290IjoiIn0=