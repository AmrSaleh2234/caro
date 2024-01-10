var mainModule =
    /******/
    (function(modules) { // webpackBootstrap
        /******/ // The module cache
        /******/
        var installedModules = {};
        /******/
        /******/ // The require function
        /******/
        function __webpack_require__(moduleId) {
            /******/
            /******/ // Check if module is in cache
            /******/
            if (installedModules[moduleId]) {
                /******/
                return installedModules[moduleId].exports;
                /******/
            }
            /******/ // Create a new module (and put it into the cache)
            /******/
            var module = installedModules[moduleId] = {
                /******/
                i: moduleId,
                /******/
                l: false,
                /******/
                exports: {}
                /******/
            };
            /******/
            /******/ // Execute the module function
            /******/
            modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
            /******/
            /******/ // Flag the module as loaded
            /******/
            module.l = true;
            /******/
            /******/ // Return the exports of the module
            /******/
            return module.exports;
            /******/
        }
        /******/
        /******/
        /******/ // expose the modules object (__webpack_modules__)
        /******/
        __webpack_require__.m = modules;
        /******/
        /******/ // expose the module cache
        /******/
        __webpack_require__.c = installedModules;
        /******/
        /******/ // define getter function for harmony exports
        /******/
        __webpack_require__.d = function(exports, name, getter) {
            /******/
            if (!__webpack_require__.o(exports, name)) {
                /******/
                Object.defineProperty(exports, name, { enumerable: true, get: getter });
                /******/
            }
            /******/
        };
        /******/
        /******/ // define __esModule on exports
        /******/
        __webpack_require__.r = function(exports) {
            /******/
            if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
                /******/
                Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
                /******/
            }
            /******/
            Object.defineProperty(exports, '__esModule', { value: true });
            /******/
        };
        /******/
        /******/ // create a fake namespace object
        /******/ // mode & 1: value is a module id, require it
        /******/ // mode & 2: merge all properties of value into the ns
        /******/ // mode & 4: return value when already ns object
        /******/ // mode & 8|1: behave like require
        /******/
        __webpack_require__.t = function(value, mode) {
            /******/
            if (mode & 1) value = __webpack_require__(value);
            /******/
            if (mode & 8) return value;
            /******/
            if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
            /******/
            var ns = Object.create(null);
            /******/
            __webpack_require__.r(ns);
            /******/
            Object.defineProperty(ns, 'default', { enumerable: true, value: value });
            /******/
            if (mode & 2 && typeof value != 'string')
                for (var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
            /******/
            return ns;
            /******/
        };
        /******/
        /******/ // getDefaultExport function for compatibility with non-harmony modules
        /******/
        __webpack_require__.n = function(module) {
            /******/
            var getter = module && module.__esModule ?
                /******/
                function getDefault() { return module['default']; } :
                /******/
                function getModuleExports() { return module; };
            /******/
            __webpack_require__.d(getter, 'a', getter);
            /******/
            return getter;
            /******/
        };
        /******/
        /******/ // Object.prototype.hasOwnProperty.call
        /******/
        __webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
        /******/
        /******/ // __webpack_public_path__
        /******/
        __webpack_require__.p = "";
        /******/
        /******/
        /******/ // Load entry module and return exports
        /******/
        return __webpack_require__(__webpack_require__.s = "./src/index.js");
        /******/
    })
    /************************************************************************/
    /******/
    ({

        /***/
        "./js/main.js":
        /*!********************!*\
          !*** ./js/main.js ***!
          \********************/
        /*! no static exports found */
        /***/
            (function(module, exports) {

            $(document).ready(function() {
                //   "use strict";

                // modal-map
                //   var map;
                //   var marker;

                // Initialize the map
                //   function initMap() {
                //     map = new google.maps.Map(document.getElementById("map"), {
                //       center: {
                //         lat: 30.46917064636305,
                //         lng: 30.9207369266489
                //       },
                //       zoom: 10
                //     });

                //     // Add a marker when the user clicks on the map
                //     map.addListener("click", function (event) {
                //       if (marker) {
                //         marker.setMap(null);
                //       }
                //       marker = new google.maps.Marker({
                //         position: event.latLng,
                //         map: map
                //       });
                //     });

                //     // Get current location
                //     function getCurrentLocation() {
                //       if (navigator.geolocation) {
                //         navigator.geolocation.getCurrentPosition(function (position) {
                //           var currentLocation = {
                //             lat: position.coords.latitude,
                //             lng: position.coords.longitude
                //           };

                //           // Add marker for current location
                //           marker = new google.maps.Marker({
                //             position: currentLocation,
                //             map: map,
                //             animation: google.maps.Animation.DROP,
                //             icon: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png" // Optional: Custom marker icon
                //           });

                //           // Center the map on the current location
                //           map.setCenter(currentLocation);

                //           // Get address for the current location
                //           getAddressFromLatLng(currentLocation.lat, currentLocation.lng);
                //         }, function (error) {
                //           console.log("Error getting current location:", error);
                //         });
                //       } else {
                //         console.log("Geolocation is not supported by this browser.");
                //       }
                //     }

                //     // Get address from latitude and longitude
                //     function getAddressFromLatLng(latitude, longitude) {
                //       var geocoder = new google.maps.Geocoder();
                //       var latlng = {
                //         lat: latitude,
                //         lng: longitude
                //       };
                //       geocoder.geocode({
                //         location: latlng
                //       }, function (results, status) {
                //         if (status === "OK") {
                //           if (results[0]) {
                //             console.log("Address:", results[0].formatted_address);
                //           } else {
                //             console.log("No address found for the provided coordinates.");
                //           }
                //         } else {
                //           console.log("Geocoder failed due to:", status);
                //         }
                //       });
                //     }

                //     // Handle the "Save" button click event
                //     $("#saveLocation").on("click", function () {
                //       if (marker) {
                //         var latitude = marker.getPosition().lat();
                //         var longitude = marker.getPosition().lng();
                //         console.log("Latitude:", latitude);
                //         console.log("Longitude:", longitude);

                //         // Get address for the saved location
                //         getAddressFromLatLng(latitude, longitude);
                //       }

                //       // Close the modal
                //       $("#modal-18").modal("hide");
                //     });

                //     // Handle the "Go to Current Location" button click event
                //     $("#goToCurrentLocation").on("click", function () {
                //       getCurrentLocation();
                //     });

                //     // Automatically go to current location on page load
                //     getCurrentLocation();
                //   }

                // Trigger the map initialization when the modal is shown
                //   $("#modal-18").on("shown.bs.modal", function () {
                //     initMap();
                //   });

                // main-sidebar

                $(".data-btn").click(function() {
                    $("nav ul .data-show").toggleClass("data-submenu");
                    $("nav ul .one").toggleClass("rotate");
                });
                $(".structure-btn").click(function() {
                    $("nav ul .structure-show").toggleClass("structure-submenu");
                    $("nav ul .two").toggleClass("rotate");
                });
                $(".employees-btn").click(function() {
                    $("nav ul .employees-show").toggleClass("employees-submenu");
                    $("nav ul .there").toggleClass("rotate");
                });
                $(".departure-btn").click(function() {
                    $("nav ul .departure-show").toggleClass("departure-submenu");
                    $("nav ul .four").toggleClass("rotate");
                });

                //slidebar-mobile

                $(".menu,.overlay-slide,.sliding-panel-close").on("click touchstart", function(e) {
                    $(".slidebar-mobile,.overlay-slide").toggleClass("is-visible");
                    $("#wrapper").toggleClass("is-obscured");
                    e.preventDefault();
                });

                //dropmenus-slidebar-mobile
                // $(".sidebar-lists li").click(function () {
                //   $(this).children(".sub-menu").slideToggle(500);
                //   $(this).toggleClass("active");
                //   event.preventDefault();
                // });
                //data-picker

                $(".date-range").daterangepicker({
                    singleDatePicker: true
                });

                //upload-imaeg
                $(".select-image").on("click", function() {
                    $("#image-upload").click();
                });

                //map

                $("#image-upload").on("change", function(event) {
                    var file = event.target.files[0];
                    var picture = $(".picture");
                    var pictureSrc = $(".picture-src");
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            picture.css("display", "block");
                            pictureSrc.attr("src", reader.result);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        picture.css("display", "none");
                        pictureSrc.attr("src", "#");
                    }
                });
                //datepicker

                $("#datetimepicker4,#datetimepicker17,#datetimepicker20,#datetimepicker22,#datetimepicker23,#datetimepicker16,#datetimepicker19").datetimepicker({
                    // format: "L",
                    format: "YYYY-MM-DD",
                    icons: {
                        time: "far fa-clock"
                            // date: "fa fa-calendar",
                            // up: "fa fa-arrow-up",
                            // down: "fa fa-arrow-down"
                    }
                });
                // timepicker

                $("#datetimepicker3,#datetimepicker2,#datetimepicker1,#datetimepicker").datetimepicker({
                    // format: "LT",
                    format: "YYYY-MM-DD",
                    icons: {
                        time: "far fa-clock"
                            // date: "fa fa-calendar",
                            // up: "fa fa-arrow-up",
                            // down: "fa fa-arrow-down"
                    }
                    // time: "fa fa-clock"
                });

                $(".repeater").repeater({
                    show: function show() {
                        $(this).slideDown();
                    },
                    hide: function hide(deleteElement) {
                            $(this).slideUp(deleteElement);
                        }
                        // ready: function (setIndexes) {},
                });

                window.outerRepeater = $(".outer-repeater").repeater({
                    isFirstItemUndeletable: true,
                    show: function show() {
                        $(this).show();
                    },
                    hide: function hide(deleteElement) {
                        $(this).hide(deleteElement);
                    }
                });
                $(".select2").select2({});
                $(".select2-tags").select2({
                    tags: true,
                });
                $(".select2-tags-max").select2({
                    tags: true,
                    maximumSelectionLength: 1
                });
                $(".js-example-tags").select2({
                    tags: true,
                });
                $(".main-Carousel").owlCarousel({
                    rtl: true,
                    loop: true,
                    margin: 30,
                    nav: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
                //prouducts
                $(".proudct-Carousel").owlCarousel({
                    rtl: true,
                    loop: true,
                    margin: 30,
                    nav: true,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                });
                $(".menu-show").each(function() {
                    var $menuIcon = $(this);
                    var $menu = $menuIcon.siblings(".emmployee-menu");
                    $menuIcon.on("click", function(e) {
                        e.preventDefault();
                        if ($menu.hasClass("show")) {
                            $menu.removeClass("show");
                        } else {
                            $(".emmployee-menu").removeClass("show"); // Hide other open menus
                            $menu.addClass("show");
                        }
                    });
                });

                // $('[data-toggle="datepicker"]').datepicker();

                $(window).on("load", function() {
                    $("#myModal").modal("show");
                });

                //add data in modal
                $(".edit-btn").click(function() {
                    var rowId = $(this).data("row-id");
                    var rowData = getRowData(rowId);
                    populateModal(rowData);
                });

                function getRowData(rowId) {
                    var rowData = [];
                    $("#row" + rowId).find("td").each(function() {
                        rowData.push($(this).text());
                    });
                    return rowData;
                }

                function populateModal(rowData) {
                    var modal = $("#modal-20");
                    var inputFields = modal.find(".form-control");

                    // Populate the input fields with row data
                    $(inputFields[0]).val(rowData[0]); // الاسم
                    $(inputFields[1]).val(rowData[1]); // تاريخ الانتهاء
                    $(inputFields[2]).val(rowData[2]); // تاريخ الاشعار

                    // Show the modal
                    modal.modal("show");
                }

                // ...
            });

            /***/
        }),

        /***/
        "./scss/main.scss":
        /*!************************!*\
          !*** ./scss/main.scss ***!
          \************************/
        /*! no static exports found */
        /***/
            (function(module, exports, __webpack_require__) {

            // extracted by mini-css-extract-plugin

            /***/
        }),

        /***/
        "./src/index.js":
        /*!**********************!*\
          !*** ./src/index.js ***!
          \**********************/
        /*! no static exports found */
        /***/
            (function(module, __webpack_exports__, __webpack_require__) {

            "use strict";
            __webpack_require__.r(__webpack_exports__);
            /* harmony import */
            var _js_main__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__( /*! ../js/main */ "./js/main.js");
            /* harmony import */
            var _js_main__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/ __webpack_require__.n(_js_main__WEBPACK_IMPORTED_MODULE_0__);
            /* harmony reexport (unknown) */
            for (var __WEBPACK_IMPORT_KEY__ in _js_main__WEBPACK_IMPORTED_MODULE_0__)
                if (["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0)(function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _js_main__WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
            __webpack_require__( /*! ../scss/main.scss */ "./scss/main.scss");


            /***/
        })

        /******/
    });
//# sourceMappingURL=main.js.map